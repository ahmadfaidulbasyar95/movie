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
	$ok              = 0;
	$_POST['id_url'] = urlencode(strtolower(@$_POST['name']));
	if ($output) 
	{
		if ($output['id_url'] == $_POST['id_url']) $ok = 1;
	}
	if ($ok == 0) 
	{
		if (empty($sys->db('SELECT 1 FROM `movie_tag` WHERE `id_url`="'.addslashes($_POST['id_url']).'"','one'))) $ok = 1;
	}
	if ($ok) 
	{
		if ($_POST['id_url'] == 'main') $ok = 0;
	}
	if ($ok) 
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
	}else
	{
		$msg[] = array('Data Exist','danger');
	}
}

include $sys->tpl('movie_tag_edit');
?>