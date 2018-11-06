<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
function user_img($img='')
{
	global $sys;
	if ($img) 
	{
		if (file_exists($sys->path['root'].'images/modules/user/'.$img)) 
		{
			$img = $sys->path['url'].'images/modules/user/'.$img;
		}else
		{
			$img = '';
		}
	}
	return $img;
}
function user_params_file($id=0,$params=array(),$params_old=array())
{
	global $sys;
	if (is_array($params) and $id) 
	{
		foreach ($params as $key => $value) 
		{
			$value = explode('|', $value);
			if (@$value['0']=='file') 
			{
				$params[$key] = @$params_old[$key];
				$file  = upload($key,$sys->path['root'].'images/modules/user/',$id.'_'.$key,@$value['1']);
				if ($file) 
				{
					$params[$key] = $file;
					if (array_key_exists($key, (array)$params_old)) 
					{
						if ($params_old[$key] and $params_old[$key] != $file) 
						{
							if (file_exists($sys->path['root'].'images/modules/user/'.$params_old[$key])) 
							{
								unlink($sys->path['root'].'images/modules/user/'.$params_old[$key]);
							}
						}
					}
				}
			}
		}
	}
	return $params;
}
function user_update($user_id=0,$data=array(),$img_input_name='image')
{
	global $sys;
	$msg  = array();
	$user = array();
	if (@$data['usr'] and @$data['name'] and @$data['email'] and $user_id) 
	{
		$user_old = $sys->db('SELECT * FROM `user` WHERE `id`="'.$user_id.'"','row');
		if ($user_old) 
		{
			$user_old['params'] = config_decode(@$user_old['params']);
			$user_old['image']  = user_img(@$user_old['image']);

			$img  = upload($img_input_name,$sys->path['root'].'images/modules/user/',$user_id,'jpg,png,jpeg');
			$_img = '';
			if ($img) 
			{
				$_img = ' , image="'.$img.'"';
			}
			if (@$_FILES[$img_input_name]['name'] and empty($img)) 
			{
				$msg = 'Image Not Allowed';
			}
			if ($sys->db('select 1 from user where username="'.addslashes($data['usr']).'" and id !="'.$user_id.'" ','one')) 
			{
				$msg[] = 'Username Exists';
			}
			if ($sys->db('select 1 from user where email="'.addslashes($data['email']).'" and id !="'.$user_id.'" ','one')) 
			{
				$msg[] = 'Email Exists';
			}
			$user = $user_old;
			if(empty($msg))
			{
				$params = (@$data['params']) ? $data['params'] : array();
				$params = user_params_file($user_id,$params,@$data['params_old']);
				if($sys->db('update user set 
												username="'.addslashes($data['usr']).'" , 
												name="'.addslashes($data['name']).'" , 
												email="'.addslashes($data['email']).'" 
												'.$_img.', 
												params="'.addslashes(config_encode($params)).'" 
											where id="'.$user_id.'"'))
				{
					if ($img) 
					{
						$y = $sys->path['url'].'images/modules/user/'.$img;
						if ($user_old['image']) 
						{
							$z = str_replace($sys->path['url'], $sys->path['root'], $user_old['image']);
							if (file_exists($z) and $user_old['image'] != $y) 
							{
								unlink($z);
							}
						}
					}
					$user = $sys->db('SELECT * FROM `user` WHERE `id`="'.$user_id.'"','row');
					if ($user) 
					{
						$user['params'] = config_decode(@$user['params']);
						$user['image']  = user_img(@$user['image']);
						$msg[] = array('Success','success');
					}
				}
			}
		}else
		{
			$msg[] = array('User not Registered','danger');
		}
	}
	return array(
		'msg'  => $msg,
		'user' => $user,
		);
}
function user_create($data=array(),$img_input_name='image')
{
	global $sys;
	$msg  = array();
	$user = array();
	if (@$data['usr'] and @$data['pwd'] and @$data['re_pwd'] and @$data['name'] and @$data['email']) 
	{
		if ($data['pwd'] != $data['re_pwd']) 
		{
			$msg[] = 'Password and Re-Password Does Not Match';
		}
		if ($sys->db('select 1 from user where username="'.addslashes($data['usr']).'"','one')) 
		{
			$msg[] = 'Username Exists';
		}
		if ($sys->db('select 1 from user where email="'.addslashes($data['email']).'"','one')) 
		{
			$msg[] = 'Email Exists';
		}
		if (empty($msg)) 
		{
			$id = id();
			$img  = upload($img_input_name,$sys->path['root'].'images/modules/user/',$id,'jpg,png,jpeg');
			$_img = '';
			if ($img) 
			{
				$_img = ' , image="'.$img.'"';
			}
			if (@$_FILES[$img_input_name]['name'] and empty($img)) 
			{
				$msg[] = 'Image Not Allowed';
			}else
			{
				$params = (@$data['params']) ? $data['params'] : array();
				$params = user_params_file($id,$params,@$data['params_old']);
				if($sys->db('insert into user set 
												username="'.addslashes($data['usr']).'" , 
												password="'.$sys->encode(addslashes($data['pwd'])).'" , 
												access="'.addslashes(@$data['access']).'" , 
												active="1" , 
												name="'.addslashes($data['name']).'" , 
												email="'.addslashes($data['email']).'" 
												'.$_img.' , 
												id="'.$id.'" , 
												params="'.addslashes(config_encode($params)).'" '))
				{
					$user = $sys->db('SELECT * FROM `user` WHERE `id`="'.$id.'"','row');
					if ($user) 
					{
						$user['params'] = config_decode(@$user['params']);
						$user['image']  = user_img(@$user['image']);
						$msg[] = array('Success','success');
					}
				}
			}
		}
	}
	return array(
		'msg'  => $msg,
		'user' => $user,
		);
}
function user_delete($id='')
{
	global $sys;
	if ($id) 
	{
		$img = $sys->db('select image from user where id="'.addslashes($id).'"','one');
		if ($img) 
		{
			$z = $sys->path['root'].'images/modules/user/'.$img;
			if (file_exists($z)) 
			{
				unlink($z);
			}
		}
		$sys->db('delete from user where id="'.addslashes($id).'"');
		return 1;
	}
}
function user_detail($value='',$key='id')
{
	global $sys;
	$output = array();
	if ($value and $key) 
	{
		$output = $sys->db('select * from user where '.addslashes($key).'="'.addslashes($value).'"','row');
		if (@$output['image']) 
		{
			$output['image'] = user_img($output['image']);
		}
		$output['params'] = config_decode($output['params']);
	}
	return $output;
}


?>