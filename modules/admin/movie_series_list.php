<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'List '.$sys->meta_title;

$id = @$_GET['id'];
$movie_url = @$_POST['movie_url'];

if ($movie_url) 
{
	$movie_url = str_replace($sys->path['url'].'movie/', '', $movie_url);
	$movie_id = $sys->db("SELECT `id` FROM `movie` WHERE `id_url`='{$movie_url}' OR `id_url_alt`='{$movie_url}' ",'one');
	if ($movie_id) 
	{
		$movie_s_id = $sys->db("SELECT `serie_id` FROM `movie_series` WHERE `movie_id`='{$movie_id}' ",'one');
		if ($movie_s_id) 
		{
			$sys->redirect($sys->mod['url_task'].'edit?id='.urlencode($movie_s_id).'&return='.urlencode($sys->mod['url_current']));
		}
	}
}

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

$output = $sys->db('SELECT `serie_id` AS `id`, GROUP_CONCAT(`name`) AS `movie` FROM `movie` AS `m` RIGHT JOIN `movie_series` AS `s` ON `m`.`id`=`s`.`movie_id` GROUP BY `serie_id` ','all',@$_GET['page'],10);

include $sys->tpl('movie_series_list');
?>