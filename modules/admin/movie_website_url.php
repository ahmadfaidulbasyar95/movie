<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$id = @$_GET['id'];
if ($id) 
{
	$output = $sys->db("SELECT 
			`ts`.*, 
			`m`.`name` AS `m_name`,
			`w`.`php_movies` AS `php_movies`,
			`w`.`php_episodes` AS `php_episodes`,
			`w`.`url` AS `w_url`,
			`w`.`name` AS `w_name`
		FROM `movie_website` AS `ts`
		LEFT JOIN `movie` AS `m` ON `ts`.`movie_id`=`m`.`id`
		LEFT JOIN `website` AS `w` ON `ts`.`website_id`=`w`.`id`
		WHERE `list_id`='$id'",'row');
}
if ($output) 
{
	$sys->meta_title = 'URL '.$sys->meta_title.' '.$output['w_name'].' - '.$output['m_name'];
	switch (@$_POST['act']) {
		case 'save':
			if ($sys->db_update($_POST,'movie_website',$id,0,'list_id')) 
			{
				$output = $sys->db("SELECT 
						`ts`.*, 
						`m`.`name` AS `m_name`,
						`w`.`php_movies` AS `php_movies`,
						`w`.`url` AS `w_url`,
						`w`.`name` AS `w_name`
					FROM `movie_website` AS `ts`
					LEFT JOIN `movie` AS `m` ON `ts`.`movie_id`=`m`.`id`
					LEFT JOIN `website` AS `w` ON `ts`.`website_id`=`w`.`id`
					WHERE `list_id`='$id'",'row');

				$msg[] = array('Save Success','success');
			}else
			{
				$msg[] = array('Failed','danger');
			}
			$sys->set_layout('blank.php');
			echo msg($msg);
			break;
		case 'test':
			$sys->stop();
			pr(php_run($output['php_episodes'],@$_POST['url']));
			break;
		
		default:
			include $sys->tpl('movie_website_url');
			break;
	}
}else
if (@$_GET['return']) 
{
	$sys->redirect($_GET['return']);
}
?>