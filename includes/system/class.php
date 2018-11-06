<?php 
class system
{

  public $url             = array();
  public $mod             = array();
  public $is_admin        = 0;
  public $admin_access_id = 0;
  public $user            = array();
  public $user_access     = array();
  public $app_home        = '';
  public $access          = array();
  public $template        = array();
  public $content         = '';
  public $blocks          = array();
  public $meta_title      = 'Title';
  public $meta_icon       = '';

  private $config          = array();
  private $db              = 'db';
  private $salt            = 'asdfghjkl1234567890';
  
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
    ';
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
  public function db($query='select "insert your query" as warning',$type='',$reset_index=0)
  {
    $_config = $this->config[$this->db];

    $connect = new mysqli($_config['SERVER'],$_config['USERNAME'],$_config['PASSWORD'],$_config['DATABASE']);
    if ($connect->connect_error) 
    {
      die('Connect Error ('.$connect->connect_errno.')'.$connect->connect_error);
    }

    $result=$connect->query($query);
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
    return $output;
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

    $output['root']     = $this->path['root'].'modules/'.$output['name'].'/';
    $output['url']      = $this->path['url'].$output['name'].'/';
    $output['url_task'] = $this->path['url'].$output['name'].'/'.$output['task'].'/';
    
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
      $patch = @debug_backtrace()['0']['file'];
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
  public function block_show($position='')
  {
    if ($position) 
    {
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
                  if ($value == $this->mod['name']) 
                  {
                    $is_show_mod = 1;
                    $is_show = 1;
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
                unset($block['show']);
                include $block['root'].'_switch.php';
              }
            }
          }
        }
      }
    }
  }
  /*Js And CSS*/
  public function link_css($url='')
  {
    if ($url) 
    {
      echo '<link href="'.$url.'" rel="stylesheet" type="text/css">';
    }
  }
  public function link_js($url='')
  {
    if ($url) 
    {
      echo '<script type="text/javascript" src="'.$url.'"></script>';
    }
  }

}

?>