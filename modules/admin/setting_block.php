<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

if (@$_GET['is_editor']) 
{
	switch (@$_POST['act']) 
	{
		case 'value':
			# code...
			break;
		
		default:
			$sys->meta_title = 'Setting Blocks';
			if (@$_GET['profill_id']) 
			{
				$sys->blocks_change(@$_GET['profill_id']);
			}
			$sys->blocks_editor = 1;
			$sys->link_js('setting_block.js',1);
			break;
	}
}else
{
	echo '<iframe src="'.$sys->mod['url_task'].'?is_editor=1&profill_id='.urlencode(@$_GET['profill_id']).'" frameborder="0" width="100%" height="600px"></iframe>';
}
?>
