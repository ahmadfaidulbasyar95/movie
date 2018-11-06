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
	$out = json_decode($string, 1);
	foreach ((array)$out as $key => $value) 
	{
		$out[$key] = urldecode($value);
	}
	if (empty($out))
	{
		$out = array();
	}
	return $out;
}
function config_encode($array = array())
{
	foreach ((array)$array as $key => $value) 
	{
		$array[$key] = urlencode($value);
	}
	return json_encode($array);
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