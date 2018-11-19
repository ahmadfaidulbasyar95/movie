<?php 

function id()
{
	$x = client_mac();
	if(empty($x)) $x=client_ip();
  return base64_encode(rand(10,1000).'_'.$_SERVER['REQUEST_TIME_FLOAT'].'_'.rand(10,1000).'_'.$x);
}

function is_url($value='')
{
	if (filter_var($value, FILTER_VALIDATE_URL)) 
	{
		return 1;
	}else
	{
		return 0;
	}
}

function client_mac($ip='')
{
	if(empty($ip)) $ip = client_ip();
	$macCommandString	=	"arp ".client_ip()." | awk 'BEGIN{ i=1; } { i++; if(i==3) print $3 }'";	
	$mac = exec($macCommandString);
	return $mac;
}

function client_ip()
{
  if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
  {
    $ip=$_SERVER['HTTP_CLIENT_IP'];
  }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
  {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else
  {
    $ip=$_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

function config_decode($string = '')
{
	$out = (is_array($string)) ? $string : json_decode($string, 1);
	foreach ((array)$out as $key => $value) 
	{
		$out[$key] = (is_array($value)) ? call_user_func(__FUNCTION__, $value) : urldecode($value);
	}
	if (empty($out))
	{
		$out = array();
	}
	return $out;
}
function config_encode($array = array(),$is_process = 1)
{
	foreach ((array)$array as $key => $value) 
	{
		$array[$key] = (is_array($value)) ? call_user_func(__FUNCTION__, $value, 0) :  urlencode($value);
	}
	return ($is_process) ? json_encode($array) : $array;
}

function upload($source='',$patch='',$name='',$allow_ext='')
{
  if ($source and $patch) 
  {
    if (@$_FILES[$source]) 
    {
    	if (@$_FILES[$source]['error'] == 0) 
    	{
	      $allow = 1;
	      $ext = explode('.', @$_FILES[$source]['name']);
	      $ext = end($ext);
	      if ($allow_ext) 
	      {
	        $allow = 0;
	        if (!is_array($allow_ext)) 
	        {
	          $allow_ext = explode(',', $allow_ext);
	        }
	        foreach ($allow_ext as $key => $value) 
	        {
	          if ($value==strtolower($ext)) 
	          {
	          	$allow = 1;
	          }
	        }
	      }
	      if ($allow) 
	      {
	        if(empty($name)) $name = $_FILES[$source]['name'];
	        move_uploaded_file($_FILES[$source]['tmp_name'], $patch.$name.'.'.$ext);
	        if (file_exists($patch.$name.'.'.$ext)) 
	        {
		        return $name.'.'.$ext;
	        }
	      }
	    }
	  }
  }
}

function pagination($page=0,$pages=0,$input_name='page',$form_method='GET',$add_html='')
{
	$page   = intval($page);
	$pagess = intval($pages);
	if ($pages) 
	{
		$opt = '';
		for ($i=0; $i < $pages; $i++) 
		{
			$opt_s = ($page == $i) ? 'selected="selected"' : '';
			$ii    = $i + 1;
			$opt  .= '<option value="'.$i.'" '.$opt_s.' >'.$ii.'</option>';
		}

		$first = ($page >= 1) ? '
				<div class="form-group">
					<button type="submit" onclick="this.form.page.value=\'0\'" class="btn btn-default"><i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i></button>
				</div>' : '';

		$prev_val = $page - 1;
		$prev     = ($page >= 1) ? '
				<div class="form-group">
					<button type="submit" onclick="this.form.page.value=\''.$prev_val.'\'" class="btn btn-default"><i class="fa fa-chevron-left"></i></button>
				</div>' : '';
		
		$next_val = $page + 1;
		$next     = ($page < $pages - 1) ? '
				<div class="form-group">
					<button type="submit" onclick="this.form.page.value=\''.$next_val.'\'" class="btn btn-default"><i class="fa fa-chevron-right"></i></button>
				</div>' : '';

		$last_val = $pages - 1;
		$last     = ($page < $pages - 1) ? '
				<div class="form-group">
					<button type="submit" onclick="this.form.page.value=\''.$last_val.'\'" class="btn btn-default"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></button>
				</div>' : '';

		return '
			<form action="" method="'.$form_method.'" class="form-inline form_pagination" role="form">
				'.$first.$prev.'
				<div class="form-group">
					<select name="'.$input_name.'" class="form-control" onchange="this.form.submit()">
						<option value="" disabled="disabled" selected="selected">Page</option>
						'.$opt.'
					</select>
				</div>
				'.$add_html.$next.$last.'
			</form>
		';
	}
}

function msg($msg='',$type='warning')
{
	$out = '';
	if ($msg) 
	{
		if (is_array($msg)) 
		{
			foreach ($msg as $key => $value) 
			{
				if (is_array($value)) 
				{
					$x = (@$value['1']) ? $value['1'] : $type;
					$out .= '
						<div class="alert alert-'.$x.'">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							'.@$value['0'].'
						</div>';
				}else
				{
					$out .= '
						<div class="alert alert-'.$type.'">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							'.$value.'
						</div>';
				}
			}
		}else
		{
			$out .= '
				<div class="alert alert-'.$type.'">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					'.$msg.'
				</div>';
		}
	}
	return $out;
}

function get_config($config_name='')
{
	global $sys;
	if ($config_name) 
	{
		$config_name = addslashes($config_name);
		return $sys->db('select value from setting where name="'.$config_name.'"','one');
	}
}
function set_config($config_name='',$config_value='')
{
	global $sys;
	if ($config_name and $config_value) 
	{
		$config_value = addslashes($config_value);
		$config_name  = addslashes($config_name);
		if (get_config($config_name)) 
		{
			$sys->db('update setting set value="'.$config_value.'" where name="'.$config_name.'"');
		}else
		{
			$sys->db('insert into setting set id="'.id().'" , value="'.$config_value.'" , name="'.$config_name.'"');
		}
		return 1;
	}
}

function url_change($url='')
{
	global $sys;
	$sys->mod['url_current'] = $url;
	echo '<script type="text/javascript"> window.history.replaceState("URL", "Title", "'.$url.'"); </script>';
}

function curl($url, $param=array(), $option=array(), $is_debug = false)
{
	if(!preg_match('~^(?:ht|f)tps?://~', $url) && file_exists($url))
	{
		return file_get_contents($url);
	}else{
		if(!preg_match('~^(?:ht|f)tps?://~', $url)) {
			$url = 'http://'.$url;
		}
	}
	$temp = '/tmp/curl';
	if(is_numeric($param))
	{
		$text			= unserialize(curl($temp.'_'.md5($url)));
		if(!empty($text[0]) && $text[0] > time())
		{
			return @$text[1];
		}
		$presists	= intval($param);
		$param		= array();
	}else $presists	= 0;
  $default = array(
  	'CURLOPT_REFERER'    => !empty($_SESSION['CURLOPT_REFERER']) ? $_SESSION['CURLOPT_REFERER'] : $url,
  	'CURLOPT_POST'       => empty($param) ? 0 : 1,
  	'CURLOPT_POSTFIELDS' => $param,
  	'CURLOPT_USERAGENT'  => @$_SERVER['HTTP_USER_AGENT'],
  	'CURLOPT_HEADER'     => 1,
  	'CURLOPT_HTTPHEADER' => array(
  		'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
  		'Accept-Language: en-US,en;q=0.5',
  		'Accept-Encoding: gzip, deflate',
  		'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7',
  		'Keep-Alive: 300',
  		'Connection: keep-alive',
  		'Content-Type: application/x-www-form-urlencoded'),
  	'CURLOPT_FOLLOWLOCATION' => 0,
  	'CURLOPT_RETURNTRANSFER' => 1,
  	'CURLOPT_COOKIEFILE'     => $temp,
  	'CURLOPT_COOKIEJAR'      => $temp
  	);
  foreach ($option as $key => $value) {
  	if (empty($value) && $value!='0') {
  		unset($option[$key]);
  	}
  }
  $data = array_merge($default, $option);
  $data['CURLOPT_POST'] = empty($data['CURLOPT_POSTFIELDS']) ? 0 : 1;

  if($data['CURLOPT_POST']) {
  	$data['CURLOPT_POSTFIELDS'] = http_build_query($data['CURLOPT_POSTFIELDS']);
  }else unset($data['CURLOPT_POSTFIELDS']);

  // $data['CURLOPT_HTTPHEADER'] = array_map('urlencode', $data['CURLOPT_HTTPHEADER']);
  $data['CURLOPT_HTTPHEADER'] = $data['CURLOPT_HTTPHEADER'];

  if (ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off')) {
  }else unset($data['CURLOPT_FOLLOWLOCATION']);

  if(strtolower(substr($url, 0, 5)) == 'https') {
  	$data['CURLOPT_FOLLOWLOCATION'] = 0;
  	$data['CURLOPT_SSL_VERIFYHOST'] = 0;
  }

  $init = curl_init( $url );
  foreach ($data as $key => $value) {
  	curl_setopt($init, constant($key), $value);
  }
	$out  = curl_exec($init);
	$info = curl_getinfo($init);
	if (!empty($info['header_size'])) {
		$header = substr($out, 0, $info['header_size']);
		$output = substr($out, $info['header_size']);
	}else{
		$header = '';
		$output = $out;
	}
  if (!empty($info['redirect_url'])) {
  	$_SESSION['CURLOPT_REFERER'] = $info['redirect_url'];
  }else{
	  $_SESSION['CURLOPT_REFERER'] = $url;
  }
  if ( $is_debug )
  {
  	$debug = array('url' => $url);
  	if(!empty($data['CURLOPT_POSTFIELDS']))
  	{
  		$debug['params'] = htmlentities($data['CURLOPT_POSTFIELDS']);
  	}
    $a = curl_errno( $init );
    if(!empty($a))
    {
    	$debug['ErrNum'] = $a;
    }
    $a = curl_error( $init );
    if(!empty($a))
    {
    	$debug['ErrMsg'] = $a;
    }
    if(empty($debug))
    {
    	echo $output;
    }else{
	    $debug['info']   = $info;
	    $debug['header'] = $header;
	    $debug['output'] = $output;
	    if (!empty($_POST['is_plain'])) {
		    print_r($debug);
	    }else{
	    	echo '<pre>'.print_r($debug, 1).'</pre>';
	    }
    }
  }
  curl_close($init);
  if($presists > 0 && !empty($output))
  {
		if ( $fp = @fopen($temp.'_'.md5($url), 'w+'))
		{
			flock($fp, LOCK_EX);
			fwrite($fp, serialize(array(strtotime('+'.$presists.' SECOND'), $output)));
			flock($fp, LOCK_UN);
			fclose($fp);
		}
  }
  return $output;
}

function php_run($php='',$params='')
{
	global $sys;
	return eval($php);
}

if (!function_exists('pr')) 
{
	function pr($text='', $return = false)
	{
		$is_multiple = (func_num_args() > 2) ? true : false;
		if(!$is_multiple)
		{
			if(is_numeric($return))
			{
				if($return==1 || $return==0)
				{
					$return = $return ? true : false;
				}else $is_multiple = true;
			}
			if(!is_bool($return)) $is_multiple = true;
		}
		if($is_multiple)
		{
			echo "<pre style='text-align:left;'>\n";
			echo "<b>1 : </b>";
			print_r($text);
			$i = func_num_args();
			if($i > 1)
			{
				$j = array();
				$k = 1;
				for($l=1;$l < $i;$l++)
				{
					$k++;
					echo "\n<b>$k : </b>";
					print_r(func_get_arg($l));
				}
			}
			echo "\n</pre>";
		}else{
			if($return)
			{
				ob_start();
			}
			echo "<pre style='text-align:left;'>\n";
			print_r($text);
			echo "\n</pre>";
			if($return)
			{
				$output = ob_get_contents();
				ob_end_clean();
				return $output;
			}
		}
	}
}
?>