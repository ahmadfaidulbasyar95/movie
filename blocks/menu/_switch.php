<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$output = $block['config'];
foreach ($output as $key => $value) 
{
	$output[$key]['link'] = $sys->path['url'].str_replace('.', '/', $value['link']);
}
include $sys->tpl($block['tpl']);
?>