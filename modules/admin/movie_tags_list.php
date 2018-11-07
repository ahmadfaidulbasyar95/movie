<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'List '.$sys->meta_title;
$id   = @$_GET['id'];
$t_id = @$_GET['t_id'];
$m_id = @$_GET['m_id'];

switch (@$_GET['act']) {
	case '1':
		if ($id) 
		{
			if ($sys->db_update(array(),'movie_tags',$id,1,'list_id')) 
			{
				$msg[] = array('Delete Success','success');
			}else
			{
				$msg[] = array('Delete Failed','danger');
			}
			if (@$_GET['return']) 
			{
				url_change($_GET['return']);
				$sys->mod['url_current'] = $_GET['return'];
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

if ($t_id) 
{
	$add_sql[] = '`ts`.`tag_id`="'.$t_id.'"';
	$add_url  .= '&t_id='.urlencode($t_id);
}

if ($m_id) 
{
	$add_sql[] = '`ts`.`movie_id`="'.$m_id.'"';
	$add_url  .= '&m_id='.urlencode($m_id);
}

$add_sql = ($add_sql) ? 'WHERE '.implode(' AND ', $add_sql) : '';

$output = $sys->db('SELECT
		`ts`.`list_id` AS `id`, 
		`m`.`id` AS `m_id`, 
		`t`.`id` AS `t_id`, 
		`m`.`name` AS `m_name`, 
		`m`.`name_alt` AS `m_name_alt`,
		`t`.`name` AS `t_name`
	FROM `movie_tags` AS `ts` 
	LEFT JOIN `movie` AS `m` ON `m`.`id`=`ts`.`movie_id`
	LEFT JOIN `movie_tag` AS `t` ON `t`.`id`=`ts`.`tag_id` '.$add_sql,'all');

include $sys->tpl('movie_tags_list');
?>