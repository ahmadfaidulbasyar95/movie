<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$img = (@$block['config']['image']) ? $block['config']['image'] : get_config('logo');
$output = array();
if ($img) 
{
	$img = $sys->path['root'].'images/'.$img;
	if (file_exists($img)) 
	{
		$img = str_replace($sys->path['root'], $sys->path['url'], $img);
		$output['image'] = $img;
		$output['url'] = (is_url(@$block['config']['url'])) ? $block['config']['url'] : $sys->path['url'].$block['config']['url'];
		include $sys->tpl($block['tpl']);
	}
}
?>