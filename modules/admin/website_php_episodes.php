<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$id = @$_GET['id'];
if ($id) 
{
	$output = $sys->db("SELECT * FROM `website` WHERE `id`='$id'",'row');
}
if ($output) 
{
	$sys->meta_title = 'PHP Episodes '.$sys->meta_title.' '.$output['name'];
	switch (@$_POST['act']) 
	{
		case 'save':
			$sys->set_layout('blank.php');

			if ($sys->db_update($_POST,'website',$id)) 
			{
				$output = $sys->db("SELECT * FROM `website` WHERE `id`='$id'",'row');
				$msg[] = array('Save Success','success');

				file_put_contents($sys->mod['root_upload'].'php_episodes/'.$output['name'].'_'.date('Y_m_d_h_i').'.txt', $output['php_episodes']);
			}else
			{
				$msg[] = array('Failed','danger');
			}
			echo msg($msg);
			break;

		case 'preview':
			$sys->stop();
			$output['php_episodes'] = @$_POST['php_episodes'];
			pr(php_run(@$_POST['php_episodes'],@$_POST['list_url']));
			break;
		
		default:
			include $sys->tpl('website_php_episodes');
			break;
	}
}else
if (@$_GET['return']) 
{
	$sys->redirect($_GET['return']);
}
?>