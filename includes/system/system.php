<?php 
define('_VALID_ACCESS', '1');

session_start();

include_once 'class.php';
include_once 'function.php';

$sys = new system($_config);

if (isset($_config['db_log'])) 
{
	$sys->db_log = $_config['db_log'];
}

if (file_exists($sys->path['root'].'setting.php')) 
{
	include_once $sys->path['root'].'setting.php';
}else
{
	die('Invalid Setting');
}

$sys->set_template_default($_setting['template_default']);
$sys->set_template();
$sys->set_icon(@$_setting['meta_icon']);

$sys->access          = $_setting['access'];
$sys->app_home        = $_setting['app_home'];
$sys->blocks          = $_setting['blocks'];
$sys->admin_access_id = $_setting['admin_access_id'];

$sys->mod_change();
$sys->func('user');
$sys->func();

if (@$_SESSION['user_id']) 
{
	$sys->user = user_detail(addslashes($_SESSION['user_id']));
	if (@$sys->user['active'] != 1) 
	{
		$sys->user = array();
		unset($_SESSION['user_id']);
	}
	if (@$sys->user['access']) 
	{
		foreach (explode(',', $sys->user['access']) as $key => $value) 
		{
			if (array_key_exists($value, $sys->access)) 
			{
				$sys->user_access[$value] = $sys->access[$value];
			}
		}
	}
}
if (array_key_exists($sys->admin_access_id, $sys->user_access)) 
{
	$sys->is_admin = 1;
}

ob_start();
include $sys->mod['root'].'_switch.php';
$sys->content = ob_get_clean();

if ($sys->mod['allowed_user']) 
{
	if ($sys->user) 
	{
		$not_allowed = 1;
		foreach ((array)$sys->user_access as $key => $value) 
		{
			if (array_key_exists($key, $sys->mod['allowed_user'])) 
			{
				$not_allowed = 0;
			}
		}
		if ($not_allowed) 
		{
			$sys->redirect('user.not_allowed');
		}
	}else
	{
		$sys->redirect('user.login');
	}
}

if ($sys->system_run) 
{
	include $sys->template['root'].$sys->template['layout'];
}else
{
	echo $sys->content;
}

?>