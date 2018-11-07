<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$id = @$_GET['id'];
if ($id) 
{
	$output = $sys->db("SELECT * FROM `movie_tag` WHERE `id`='$id'",'row');
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
	if ($sys->db_update($_POST,'movie_tag',$id)) 
	{
		if ($id) 
		{
			$output = $sys->db("SELECT * FROM `movie_tag` WHERE `id`='$id'",'row');
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

include $sys->tpl('movie_tag_edit');
?>