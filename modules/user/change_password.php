<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$msg = '';
if (@$_POST['pwd_old'] and @$_POST['pwd'] and @$_POST['re_pwd']) 
{
	if ($sys->decode($sys->user['password'])==$_POST['pwd_old']) 
	{
		if ($_POST['pwd'] == $_POST['re_pwd']) 
		{
			$sys->db('update user set password="'.$sys->encode($_POST['pwd']).'" where id="'.$sys->user['id'].'"');
			$msg = array(array('Success','success'));
		}else
		{
			$msg = 'New Password and Re-Password Does Not Match';
		}
	}else
	{
		$msg = 'Invalid Password Old';
	}
}
include $sys->tpl('change_password');
?>