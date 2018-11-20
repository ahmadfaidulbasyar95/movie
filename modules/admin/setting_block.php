<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

if (@$_GET['is_editor']) 
{
	switch (@$_POST['act']) 
	{
		case 'update_orderby':
			unset($_POST['act']);
			foreach ($_POST as $key => $value) 
			{
				$sys->db_update(array('orderby'=>$value),'block',$key);
			}
			$sys->stop();
			break;

		case 'update_position_orderby':
			unset($_POST['act']);
			$id = $_POST['id'];
			unset($_POST['id']);
			$sys->db_update($_POST,'block',$id);
			$sys->stop();
			break;
		
		default:
			if (@$_GET['profill_id']) 
			{
				$sys->blocks_change(@$_GET['profill_id']);
			}
			$sys->blocks_editor = 1;
			$sys->link_js('setting_block.js',1);
			$sys->link_css('setting_block.css',1);
			break;
	}
}else
{
	$sys->meta_title = 'Setting Blocks';
	echo '<iframe src="'.$sys->mod['url_task'].'?is_editor=1&profill_id='.urlencode(@$_GET['profill_id']).'" frameborder="0" width="100%" height="600px"></iframe>';
}
?>
