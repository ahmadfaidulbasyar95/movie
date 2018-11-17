<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

$output = $sys->db('SELECT * FROM `movie` WHERE `active`=1 AND `id_url`="'.addslashes($id).'"','row');

if (empty($output)) $output = $sys->db('SELECT * FROM `movie` WHERE `active`=1 AND `id_url_alt`="'.addslashes($id).'"','row');

if($output)
{
	$sys->meta_title = $output['name'];

	$output['id_url']     = $sys->path['url'].'movie/'.$output['id_url'];
	$output['id_url_alt'] = $sys->path['url'].'movie/'.$output['id_url_alt'];
	$output['image']      = admin_img($output['image'],'movie');

	$output['tags'] = $sys->db("SELECT `t`.* FROM `movie_tag` AS `t` LEFT JOIN `movie_tags` AS `ts` ON `t`.`id`=`ts`.`tag_id` WHERE `movie_id`='{$output['id']}' AND `active`=1 ",'all');

	foreach ($output['tags'] as $key => $value) 
	{
		$output['tags'][$key]['id_url'] = $sys->path['url'].'tag/'.$value['id_url'];
	}

	$serie_id = $sys->db("SELECT `serie_id` FROM `movie_series` WHERE `movie_id`='{$output['id']}'",'one');

	$output['series'] = array();

	if ($serie_id) 
	{
		$output['series'] = $sys->db("SELECT `m`.* FROM `movie_series` AS `s` LEFT JOIN `movie` AS `m` ON `m`.`id`=`s`.`movie_id`  WHERE `serie_id`='{$serie_id}' AND `movie_id` != '{$output['id']}'",'all');

		foreach ($output['series'] as $key => $value) 
		{
			$output['series'][$key]['id_url']     = $sys->path['url'].'movie/'.$value['id_url'];
			$output['series'][$key]['id_url_alt'] = $sys->path['url'].'movie/'.$value['id_url_alt'];
			$output['series'][$key]['image']      = admin_img($value['image'],'movie');
		}
	}

	$output['website'] = $sys->db("SELECT `w`.`id`,`w`.`name`,`w`.`url`,`w`.`php_episodes`, `m`.`ep_last`, `m`.`url` AS `url_target` FROM `movie_website` AS `m` LEFT JOIN `website` AS `w` ON `w`.`id`=`m`.`website_id` WHERE `movie_id` = '{$output['id']}'",'all');

	foreach ($output['website'] as $key => $value) 
	{
		$output['website'][$key]['episodes'] = php_run($value['php_episodes'],$value['url_target']);
		unset($output['website'][$key]['php_episodes']);

		if (empty($output['website'][$key]['episodes'])) 
		{
			$output['website'][$key]['episodes'] = array();
		}

		foreach ($output['website'][$key]['episodes'] as $key1 => $value1) 
		{
			if (!is_url($value1['link'])) 
			{
				$output['website'][$key]['episodes'][$key1]['link'] = $value['url'].$value1['link'];
			}
		}
	}

	include $sys->tpl('list_detail');
}else
{
	include 'list.php';
}
