<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$msg = array();
if (@$_POST['usr'] and @$_POST['name'] and @$_POST['email']) 
{
	$update = user_update($sys->user['id'],$_POST);
	if ($update['user']) 
	{
		$sys->user = $update['user'];
		$msg = $update['msg'];
	}
}
include $sys->tpl('profill');
?>