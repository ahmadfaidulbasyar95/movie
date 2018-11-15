<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

$sys->meta_title = 'Movie';

$add_from  = '';
$add_where = '1';
$tag       = @$_POST['tag'];

if (@$tag['id']) 
{
	$sys->meta_title .= ' '.$tag['name'];

	$add_from  .= ' LEFT JOIN `movie_tags` AS `ts` ON `ts`.`movie_id`=`m`.`id`';
	$add_where .= ' AND `tag_id`="'.addslashes($tag['id']).'"';
}

$output = $sys->db("SELECT * FROM `movie` AS `m` $add_from WHERE `active` = 1 AND $add_where ORDER BY `updated` DESC",'all');

foreach ($output as $key => $value) 
{
	$output[$key]['id_url']     = $sys->path['url'].'movie/'.$value['id_url'];
	$output[$key]['id_url_alt'] = $sys->path['url'].'movie/'.$value['id_url_alt'];
	$output[$key]['image']      = admin_img($value['image'],'movie');
}

include $sys->tpl('list');