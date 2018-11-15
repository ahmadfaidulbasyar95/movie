<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

$sys->meta_title = 'Tag';

$output = $sys->db('SELECT * FROM `movie_tag` WHERE `active`=1 ORDER BY `name`','all');

foreach ($output as $key => $value) 
{
	$output[$key]['id_url'] = $sys->path['url'].'tag/'.$value['id_url'];
}

include $sys->tpl('list');