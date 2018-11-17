<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'List '.$sys->meta_title;
$id   = @$_GET['id'];
$w_id = @$_GET['w_id'];
$m_id = @$_GET['m_id'];

switch (@$_GET['act']) {
	case '1':
		if ($id) 
		{
			if ($sys->db_update(array(),'movie_website',$id,1,'list_id')) 
			{
				$msg[] = array('Delete Success','success');
			}else
			{
				$msg[] = array('Delete Failed','danger');
			}
			if (@$_GET['return']) 
			{
				url_change($_GET['return']);
			}else
			{
				url_change($sys->mod['url_task']);
			}
		}
		break;
	
	default:
		# code...
		break;
}

$add_sql = array();
$add_url = '';

if ($w_id) 
{
	$add_sql[] = '`ts`.`website_id`="'.$w_id.'"';
	$add_url  .= '&w_id='.urlencode($w_id);
}

if ($m_id) 
{
	$add_sql[] = '`ts`.`movie_id`="'.$m_id.'"';
	$add_url  .= '&m_id='.urlencode($m_id);
}

$add_sql = ($add_sql) ? 'WHERE '.implode(' AND ', $add_sql) : '';

$output = $sys->db('SELECT
		`ts`.`list_id` AS `id`, 
		`ts`.`url` AS `url`, 
		`m`.`id` AS `m_id`, 
		`m`.`ep_total`,
		`ts`.`ep_last`,
		`w`.`id` AS `w_id`, 
		`m`.`name` AS `m_name`, 
		`m`.`name_alt` AS `m_name_alt`,
		`w`.`name` AS `w_name`
	FROM `movie_website` AS `ts` 
	LEFT JOIN `movie` AS `m` ON `m`.`id`=`ts`.`movie_id`
	LEFT JOIN `website` AS `w` ON `w`.`id`=`ts`.`website_id` '.$add_sql,'all');

include $sys->tpl('movie_website_list');
?>