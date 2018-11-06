<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

if (@$_SESSION['user_id'] || $sys->user) 
{
	$sys->redirect('user.profill');
}else
{
	$msg = '';
	if (@$_POST['usr'] and @$_POST['pwd']) 
	{
		$a = $sys->db('select id,password,active from user where username="'.addslashes($_POST['usr']).'"','row');
		if ($a) 
		{
			if ($sys->decode(@$a['password'])==$_POST['pwd']) 
			{
				if (@$a['active']) 
				{
					$_SESSION['user_id'] = $a['id'];
					$sys->redirect('user.profill');
				}else
				{
					$msg = 'Account Has Been Disabled';
				}
			}else
			{
				$msg = 'Invalid Password';
			}
		}else
		{
			$msg = 'Invalid User';
		}
	}
	include $sys->tpl('login');
}
?>