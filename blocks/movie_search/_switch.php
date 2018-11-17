<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$output = $sys->db("SELECT `id_url`,`name` FROM `movie` WHERE `active`=1",'all');

foreach ($output as $key => $value) 
{
	$output[$key]['url'] = $sys->path['url'].'movie/'.$value['id_url'];
}

include $sys->tpl($block['tpl']);
?>