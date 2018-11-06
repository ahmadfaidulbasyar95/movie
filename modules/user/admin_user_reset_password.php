<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

$id = @$sys->mod['sub_task']['0'];
if ($id) 
{
	$sys->db('update `user` set `password`="'.$sys->encode(get_config('def_password')).'" WHERE id="'.$id.'" ');
	echo msg('Reset Password Success','success');
	$sys->redirect(@$_GET['return'],1);
}
