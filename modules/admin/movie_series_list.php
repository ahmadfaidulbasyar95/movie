<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'List '.$sys->meta_title;

$id = @$_GET['id'];

switch (@$_GET['act']) {
	case '1':
		if ($id) 
		{
			if ($sys->db_update(array(),'movie_series',$id,1,'serie_id')) 
			{
				$msg[] = array('Delete Success','success');
			}else
			{
				$msg[] = array('Delete Failed','danger');
			}
			url_change($sys->mod['url_task']);
		}
		break;
	
	default:
		# code...
		break;
}

$output = $sys->db('SELECT `serie_id` AS `id`, GROUP_CONCAT(`name`) AS `movie` FROM `movie` AS `m` RIGHT JOIN `movie_series` AS `s` ON `m`.`id`=`s`.`movie_id` GROUP BY `serie_id` ','all');

include $sys->tpl('movie_series_list');
?>