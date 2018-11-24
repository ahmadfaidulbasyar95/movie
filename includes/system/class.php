<?php 
class system
{

  public $path              = array();
  public $mod               = array();
  public $is_admin          = 0;
  public $admin_access_id   = 0;
  public $user              = array();
  public $user_access       = array();
  public $app_home          = '';
  public $access            = array();
  public $template          = array();
  public $meta_title        = 'Title';
  public $meta_icon         = '';
  public $meta_add_text     = '';
  public $db_log            = 0;
  public $db_log_data       = array();
  public $system_run        = 1;
  public $blocks_profill_id = 'default';
  public $blocks_editor     = 0;
  public $blocks            = array();
  public $content           = '';

  private $config = array();
  private $db     = 'db';
  private $salt   = 'asdfghjkl1234567890';
  
  function __construct($_config)
  {
    $this->config = $_config;

    $patch = @$_config['patch'];
    if(empty($patch)) $patch = '/';

    $actual_link = array();
    $actual_link['root'] = $_SERVER['DOCUMENT_ROOT'].$patch;
    $actual_link['url'] = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$patch";

    $this->path = $actual_link;
    $this->salt = @$_config['salt'];
  }

  public function stop()
  {
    $this->system_run = 0; 
  }

  public function encode($val='')
  {
    if ($val) 
    {
      $a = substr($this->salt, 0, 5);
      $b = substr($this->salt, 5);
      $c = base64_encode($val);
      return base64_encode($a.$c.$b);
    }
  }
  public function decode($val='')
  {
    if ($val) 
    {
      $a = substr($this->salt, 0, 5);
      $b = substr($this->salt, 5);
      $c = base64_decode($val);
      if ($a == substr($c, 0, 5)) 
      {
        if ($b == substr($c, strpos($c, $b))) 
        {
          $c = str_replace($a, '', $c);
          $c = str_replace($b, '', $c);
          return base64_decode($c);
        }
      }
    }
  }

  /*Meta*/
  public function meta()
  {
    echo '
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="'.$this->meta_icon.'">
    <title>'.$this->meta_title.'</title>
    '.$this->meta_add_text;
  }
  public function meta_add($text)
  {
    $this->meta_add_text .= $text;
  }
  public function set_icon($img='')
  {
    if ($img) 
    {
      if (is_url($img)) 
      {
        $this->meta_icon = $img;
      }else
      {
        if (file_exists($this->path['root'].'images/'.$img)) 
        {
          $this->meta_icon = $this->path['url'].'images/'.$img;
        }
      }
    }
  }

  /*Template*/
  public function set_layout($layout='index.php')
  {
    if (file_exists($this->template['root'].$layout)) 
    {
      $this->template['layout'] = $layout;
    }else
    {
      die('Invalid Template');
    }
  }
  public function set_template($template_name='')
  {
    if(empty($template_name)) $template_name = $this->template['default'];

    $this->template['name'] = $template_name;
    $this->template['root'] = $this->path['root'].'templates/'.$this->template['name'].'/';
    $this->template['url']  = $this->path['url'].'templates/'.$this->template['name'].'/';

    $this->set_layout();
  }
  public function set_template_default($template_name='default')
  {
    $this->template['default'] = $template_name;
  }
  /*Database*/
  public function set_db($_db='db')
  {
    $this->db = $_db;
  }
  public function db($query='select "insert your query" as warning',$type='',$page=0,$show_item=0,$reset_index=0)
  {
    if ($show_item) 
    {
      $show_item = intval($show_item);
      $page      = intval($page);
      $db_total  = $this->db("SELECT COUNT(*) FROM ({$query}) AS `total`",'one');
      $db_limit  = ($page) ? ' LIMIT '.$page*$show_item.','.$show_item : ' LIMIT '.$show_item ;
      $db_pages  = ceil($db_total / $show_item);
      $query    .= $db_limit;
    }

    $_config = $this->config[$this->db];

    $connect = new mysqli($_config['SERVER'],$_config['USERNAME'],$_config['PASSWORD'],$_config['DATABASE']);
    if ($connect->connect_error) 
    {
      die('Connect Error ('.$connect->connect_errno.')'.$connect->connect_error);
    }

    $result = $connect->query($query);

    if ($this->db_log || $connect->error) 
    {
      $log = array($query);

      if($connect->error)
      {
        $result = (empty($type) || $type == 'one') ? '' : array();
        $type   = '';
        $log[]  = '#'.$connect->errno.' - '.$connect->error;
      }

      foreach ((array)debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS,10) as $key => $value) {
        $value['file'] = str_replace('\\', '/', $value['file']);
        $log[]         = $value['file'].':'.$value['line'];
      }

      $this->db_log_data[] = $log;

      if($connect->error and $this->db_log)
      {
        pr($log);
      }
    }

    $output=array();

    switch ($type) {
      case 'all':
        if ($reset_index) 
        {
          while($row=$result->fetch_row())
          {
            $output[]=$row;
          }
        }else
        {
          while($row=$result->fetch_assoc())
          {
            $output[]=$row;
          }
        }
        break;
      case 'assoc':
        if ($reset_index) 
        {
          while($row=$result->fetch_row())
          {
            $in = $row[array_keys($row)['0']];
            unset($row[array_keys($row)['0']]);
            $output[$in]=array_values($row);
          }
        }else
        {
          while($row=$result->fetch_assoc())
          {
            $in = $row[array_keys($row)['0']];
            unset($row[array_keys($row)['0']]);
            $output[$in]=$row;
          }
        }
        break;
      case 'one':
        $output = $result->fetch_row()['0'];
        break;
      case 'row':
        if ($reset_index) 
        {
          $output = $result->fetch_row();
        }else
        {
          $output = $result->fetch_assoc();
        }
        break;
      case 'col':
        while($row=$result->fetch_row())
        {
          $output[]=$row['0'];
        }
        break;
      
      default:
        $output = $result;
        break;
    }

    if ($show_item) 
    {
      return array(
          'list'  => $output,
          'total' => $db_total,
          'page'  => $page,
          'pages' => $db_pages
        );
    }else
    {
      return $output;
    }
  }
  public function db_update($data=array(),$table='',$id='',$is_delete=0,$id_field='id')
  {
    $out   = '';
    $table = addslashes($table);
    $id    = addslashes($id);
    if ($id and $is_delete and $table) 
    {
      if ($this->db("DELETE FROM `$table` WHERE `$id_field`='$id'")) 
      {
        $out = $id;
      }
    }else
    {
      if (is_array($data) and $table and $data) 
      {
        $query = [];
        if (empty($id)) 
        {
          if (array_key_exists($id_field, $data)) 
          {
            $id_temp         = $data[$id_field];
          }else
          {
            $id_temp         = id();
            $data[$id_field] = $id_temp;
          }
        }

        $allowed_field = $this->db("DESC `$table`",'col');

        foreach ($data as $key => $value) 
        {
          if (in_array($key, $allowed_field)) 
          {
            $query[] = ' `'.$key.'`="'.addslashes($value).'"';
          }
        }

        if ($query) 
        {
          $query = 'SET '.implode(',', $query);
          if ($id) 
          {
            if ($this->db("UPDATE `$table` $query WHERE `$id_field`='$id'")) 
            {
              $out = $id;
            }
          }else
          {
            if ($this->db("INSERT INTO `$table` $query")) 
            {
              $out = $id_temp;
            }
          }
        }
      }
    }
    return $out;
  }
  public function db_log()
  {
    if ($this->db_log_data) 
    {
      pr($this->db_log_data);
    }
  }

  /*Module And Block*/
  public function mod_change($mod_name='',$mod_task='')
  {
    $output   = array();
    $app_home = explode('.', $this->app_home);

    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]".explode('?', $_SERVER['REQUEST_URI'])['0'];

    $mod = str_replace($this->path['url'], '', $actual_link);
    $mod = explode('/', $mod);

    if($mod_name) $output['name'] = $mod_name;
    else $output['name']          = !empty($mod['0']) ? $mod['0'] : @$app_home['0'] ;

    if($mod_task) $output['task'] = $mod_task;
    else $output['task']          = !empty($mod['1'])  ? $mod['1'] : '' ;
    if(empty($mod['0'])) $output['task'] = @$app_home['1'];

    $output['sub_task'] = array_slice($mod, 2);

    if ($output['name'] and empty($output['task'])) $output['task'] = 'main' ;

    $output['root']        = $this->path['root'].'modules/'.$output['name'].'/';
    $output['root_upload'] = $this->path['root'].'images/modules/'.$output['name'].'/';
    $output['url']         = $this->path['url'].$output['name'].'/';
    $output['url_upload']  = $this->path['url'].'images/modules/'.$output['name'].'/';
    $output['url_task']    = $this->path['url'].$output['name'].'/'.$output['task'].'/';
    $output['url_current'] = $this->path['url'].implode('/', $mod);

    if(@$_SERVER['QUERY_STRING']) $output['url_current'] .= '?'.$_SERVER['QUERY_STRING'];
    
    if (file_exists($output['root'].'_switch.php')) 
    {
      foreach ($output as $key => $value) 
      {
        $this->mod[$key] = $value;
      }
      $this->mod_allowed_user();
    }else
    {
      $this->mod_change(@$app_home['0'],@$app_home['1']);
    }    
  }
  public function mod_allowed_user($access_id=array())
  {
    $this->mod['allowed_user'] = array();
    if ($access_id == 'all') 
    {
      $this->mod['allowed_user'] = $this->access;
    }else
    {
      if (!is_array($access_id)) 
      {
        $access_id = explode(',', $access_id);
      }
      foreach ((array)$access_id as $key => $value) 
      {
        if (array_key_exists($value, $this->access)) 
        {
          $this->mod['allowed_user'][$value] = $this->access[$value];
        }
      }
    }
  }
  public function func($mod_name='')
  {
    if(empty($mod_name)) $mod_name = $this->mod['name'];
    if (file_exists($this->path['root'].'modules/'.$mod_name.'/_function.php')) 
    {
      include_once $this->path['root'].'modules/'.$mod_name.'/_function.php';
    }
  }
  public function redirect($mod='',$delay=0)
  {
    $url = '';
    if ($mod) 
    {
      if (is_url($mod)) 
      {
        $url = $mod;
      }else
      {
        $url = $this->path['url'].str_replace('.', '/', $mod);
      }
    }
    if ($url) 
    {
      if (intval($delay)) 
      {
        echo '<meta http-equiv="refresh" content="'.intval($delay).'; url='.$url.'">';
      }else
      {
        header('location:'.$url);
      }
    }
  }
  public function tpl($tpl='')
  {
    if ($tpl) 
    {
      $tpl  .= '.html.php';
      $patch = @debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS,1)['0']['file'];
      $patch = str_replace('\\', '/', $patch);
      $patch = explode('/', $patch);
      $patch = str_replace(end($patch), '', implode('/', $patch));
      $patch = str_replace($this->template['root'], '', $patch);
      $patch = str_replace($this->path['root'], '', $patch);

      if (file_exists($this->template['root'].$patch.$tpl)) 
      {
        return $this->template['root'].$patch.$tpl;
      }else
      if (file_exists($this->path['root'].$patch.$tpl)) 
      {
        return $this->path['root'].$patch.$tpl;
      }
    }
  }
  public function blocks_change($blocks_profill_id='',$is_get_data=0)
  {
    $output = array();

    if (empty($blocks_profill_id)) $blocks_profill_id = $this->blocks_profill_id;
    if (empty($blocks_profill_id)) $blocks_profill_id = 'default';
    $blocks_profill_id = addslashes($blocks_profill_id);

    $blocks = $this->db("SELECT * FROM `block` WHERE `active`='1' AND `profill_id`='$blocks_profill_id' ORDER BY `orderby`",'all');
    if ($blocks) 
    {
      $blocks_ = array();
      foreach ($blocks as $key => $value) 
      {
        $position = $value['position'];
        unset($value['position']);
        unset($value['profill_id']);
        unset($value['active']);

        $value['show']        = config_decode($value['show']);
        $value['config']      = config_decode($value['config']);
        $blocks_[$position][] = $value;
      }
      if ($is_get_data) 
      {
        $output = array(
          'profill_id' => $blocks_profill_id,
          'list'       => $blocks_
          );
      }else
      {
        $this->blocks_profill_id = $blocks_profill_id;
        $this->blocks            = $blocks_;
      }
    }else
    if ($this->blocks and empty($is_get_data))
    {
      foreach ($this->blocks as $key => $value) 
      {
        if (is_array($value)) 
        {
          $orderby = 1;
          foreach ($value as $key1 => $value1) 
          {
            if (@$value1['title'] and @$value1['name'] and @$value1['tpl']) 
            {
              if (empty(@$value1['show'])) $value1['show']     = array();
              if (empty(@$value1['config'])) $value1['config'] = array();

              $value1['show']       = config_encode($value1['show']);
              $value1['config']     = config_encode($value1['config']);
              $value1['active']     = 1;
              $value1['title_show'] = 1;
              $value1['position']   = $key;
              $value1['profill_id'] = $blocks_profill_id;
              $value1['orderby']    = $orderby;
              $orderby++;

              $this->db_update($value1,'block');
            }
          }
        }
      }
      $this->blocks_change($blocks_profill_id);
    }
    return $output;
  }
  public function block_show($position='')
  {
    if ($position) 
    {
      if ($this->blocks_editor) 
      {
        echo '<div class="blocks_editor_position" data-position="'.$position.'"><h4 class="blocks_editor_action">'.ucwords(str_replace('_', ' ', $position)).'</h4>';
      }
      if (array_key_exists($position, $this->blocks)) 
      {
        foreach ((array)$this->blocks[$position] as $block_id => $block) 
        {
          if (@$block['name']) 
          {
            $block['position'] = $position;
            $block['root']     = $this->path['root'].'blocks/'.$block['name'].'/';
            $block['url']      = $this->path['url'].'blocks/'.$block['name'].'/';
            if (file_exists($block['root'].'_switch.php')) 
            {
              if (@$block['id']) $block_id = $block['id'];
              if ($this->blocks_editor and $block['name'] != 'layout') 
              {
                echo '<div class="blocks_editor_component" data-id="'.$block_id.'" data-orderby="'.$block['orderby'].'"><h4 class="blocks_editor_action">'.$block['title'].'</h4></div>';
              }else
              {
                if ($this->blocks_editor and $block['name'] == 'layout') 
                {
                  echo '<div class="blocks_editor_component_position" data-id="'.$block_id.'" data-orderby="'.$block['orderby'].'"><h4 class="blocks_editor_action">'.ucwords(str_replace('_', ' ', $block['title'])).'</h4>';
                }
                $is_show = 1;
                $is_show_access = 1;
                if (@$block['show']['access']) 
                {
                  $is_show = 0;
                  $is_show_access = 0;
                  foreach ((array)$block['show']['access'] as $key => $value) 
                  {
                    if (array_key_exists($value, (array)$this->user_access)) 
                    {
                      $is_show_access = 1;
                      $is_show = 1;
                    }
                  }
                }
                $is_show_mod = 1;
                if (@$block['show']['mod']) 
                {
                  $is_show = 0;
                  $is_show_mod = 0;
                  foreach ((array)$block['show']['mod'] as $key => $value) 
                  {
                    if (strpos($value, '.')) 
                    {
                      $value = explode('.', $value);
                      if ($value['0'] == $this->mod['name'] and $value['1'] == $this->mod['task']) 
                      {
                        $is_show_mod = 1;
                        $is_show = 1;
                      }
                    }else
                    {
                      if ($value == $this->mod['name']) 
                      {
                        $is_show_mod = 1;
                        $is_show = 1;
                      }
                    }
                  }
                }
                if (@$block['show']['access'] and @$block['show']['mod']) 
                {
                  if ($is_show_access and $is_show_mod) 
                  {
                    $is_show = 1;
                  }else
                  {
                    $is_show = 0;
                  }
                }
                if ($is_show) 
                {
                  global $sys;
                  if (empty($this->blocks_editor) and empty($block['title_show'])) 
                  {
                    $block['title'] = '';
                  }
                  include $block['root'].'_switch.php';
                }
                if ($this->blocks_editor and $block['name'] == 'layout') 
                {
                  echo '</div>';
                }
              }
            }
          }
        }
      }
      if ($this->blocks_editor) 
      {
        echo '</div>';
      }
    }
  }
  /*Js And CSS*/
  public function link_css($url='',$is_meta=0)
  {
    if ($url) 
    {
      if (!is_url($url)) 
      {
        $patch = @debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS,1)['0']['file'];
        $patch = str_replace('\\', '/', $patch);
        $patch = explode('/', $patch);
        $patch = str_replace(end($patch), '', implode('/', $patch));
        $patch = str_replace($this->path['root'], $this->path['url'], $patch);
        $url   = $patch.$url;
      }
      if ($is_meta) 
      {
        $this->meta_add('<link href="'.$url.'" rel="stylesheet" type="text/css">');
      }else
      {
        echo '<link href="'.$url.'" rel="stylesheet" type="text/css">';
      }
    }
  }
  public function link_js($url='',$is_meta=0)
  {
    if ($url) 
    {
      if (!is_url($url)) 
      {
        $patch = @debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS,1)['0']['file'];
        $patch = str_replace('\\', '/', $patch);
        $patch = explode('/', $patch);
        $patch = str_replace(end($patch), '', implode('/', $patch));
        $patch = str_replace($this->path['root'], $this->path['url'], $patch);
        $url   = $patch.$url;
      }
      if ($is_meta) 
      {
        $this->meta_add('<script type="text/javascript" src="'.$url.'"></script>');
      }else
      {
        echo '<script type="text/javascript" src="'.$url.'"></script>';
      }
    }
  }

}

?>