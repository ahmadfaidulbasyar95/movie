<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
function admin_img($img='',$mod='')
{
	global $sys;
	if ($img) {
		if ($mod) $img = 'modules/'.$mod.'/'.$img;

		if (file_exists($sys->path['root'].'images/'.$img)) 
		{
			return $sys->path['url'].'images/'.$img;
		}
	}
}
?>