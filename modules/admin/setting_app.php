<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

if ($_POST) 
{
	foreach ($_POST as $key => $value) 
	{
		set_config($key,$value);
	}
	$ok=1;
}
foreach ($_FILES as $key => $value) 
{
	$file = upload($key,$sys->path['root'].'images/',$key,'jpg,png,jpeg,svg');
	if ($file) 
	{
		$file_old = get_config($key);
		if ($file_old and $file_old != $file) 
		{
			$file_old = $sys->path['root'].'images/'.$file_old;
			if (file_exists($file_old)) 
			{
				unlink($file_old);
			}
		}
		set_config($key,$file);
	}else if (@$_FILES[$key]['name'])
	{
		$msg[] = array(strtoupper($key).' Image not allowed','danger');
	}
	$ok=1;
}
if ($ok) 
{
	$msg[] = array('Success','success');
}
include $sys->tpl('setting');
?>