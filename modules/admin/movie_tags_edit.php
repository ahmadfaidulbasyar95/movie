<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$id   = @$_GET['id'];
$t_id = @$_GET['t_id'];
$m_id = @$_GET['m_id'];

if ($id) 
{
	$output = $sys->db("SELECT * FROM `movie_tags` WHERE `list_id`='$id'",'row');
}
if ($output) 
{
	$sys->meta_title = 'Edit '.$sys->meta_title;
}else
{
	$id              = '';
	$sys->meta_title = 'Add '.$sys->meta_title;
}

if ($_POST) 
{
	foreach ($_POST as $key => $value) 
	{
		$_POST[$key] = addslashes($value);
	}

	if ($sys->db("SELECT 1 FROM `movie_tags` WHERE `tag_id`='{$_POST['tag_id']}' AND `movie_id`='{$_POST['movie_id']}'",'one')) 
	{
		$msg[] = array('Data Exists','warning');
	}else
	{
		if ($sys->db_update($_POST,'movie_tags',$id,0,'list_id')) 
		{
			if ($id) 
			{
				$output = $sys->db("SELECT * FROM `movie_tags` WHERE `list_id`='$id'",'row');
				$msg[] = array('Update Success','success');
			}else
			{
				$msg[] = array('Insert Success','success');
			}
		}else
		{
			$msg[] = array('Failed','danger');
		}
	}
}

$output['movies'] = $sys->db('SELECT `id`,`name` FROM `movie`','assoc');
$output['tags']   = $sys->db('SELECT `id`,`name` FROM `movie_tag`','assoc');

include $sys->tpl('movie_tags_edit');
?>