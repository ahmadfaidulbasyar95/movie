<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
if (@$sys->mod['sub_task']['0']) 
{
	$a = $sys->db('select id,password,active from user where username="'.addslashes($sys->mod['sub_task']['0']).'"','row');
	if ($a) 
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
		$msg = 'Invalid User';
	}
}
?>