<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

$output = $sys->db('SELECT * FROM `movie_tag` WHERE `active`=1 AND `id_url`="'.addslashes($id).'"','row');

if($output)
{
	$output['id_url'] = $sys->path['url'].'tag/'.$output['id_url'];
	$_POST['tag']     = $output;
	$output           = array();

	include $sys->path['root'].'modules/movie/list.php';
}else
{
	include 'list.php';
}
