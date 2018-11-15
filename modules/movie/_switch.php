<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->func('admin');
$sys->set_icon(admin_img(get_config('logo')));

$output = array();
$msg    = array();
$ok     = 0;

$id = $sys->mod['task'];

if ($id != 'main') 
{
	include 'list_detail.php';
}else
{
	include 'list.php';
}

?>