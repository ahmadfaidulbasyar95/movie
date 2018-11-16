<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$id               = @$_GET['id'];
$output['series'] = array();

if ($id) 
{
	$output['series'] = $sys->db("SELECT `movie_id` FROM `movie_series` WHERE `serie_id`='$id'",'col');
}
if ($output['series']) 
{
	$sys->meta_title = 'Edit '.$sys->meta_title;
}else
{
	$id              = '';
	$sys->meta_title = 'New '.$sys->meta_title;
}

if (@$_SESSION['tmp_msg']) 
{
	$msg = $_SESSION['tmp_msg'];
	unset($_SESSION['tmp_msg']);
}

if ($id) 
{
	$del_id = @$_GET['del_id'];
	if ($del_id) 
	{
		if ($sys->db_update($_POST,'movie_series',$del_id,1,'movie_id')) 
		{
			$msg[] = array('Delete Success','success');
		}else
		{
			$msg[] = array('Failed','danger');
		}
		if (@$_GET['return']) 
		{
			$_SESSION['tmp_msg'] = $msg;
			$sys->redirect($_GET['return']);
		}
	}
}

if ($_POST) 
{
	if (empty($sys->db('SELECT 1 FROM `movie_series` WHERE `movie_id`="'.addslashes($_POST['movie_id']).'"','one'))) 
	{
		if ($id) 
		{
			$_POST['serie_id'] = $id;
			if ($sys->db_update($_POST,'movie_series','',0,'serie_id')) 
			{
				$output['series'] = $sys->db("SELECT `movie_id` FROM `movie_series` WHERE `serie_id`='$id'",'col');
				$msg[] = array('Insert Success','success');
			}else
			{
				$msg[] = array('Failed','danger');
			}
		}else
		{
			$new_id = $sys->db_update($_POST,'movie_series','',0,'serie_id');
			if ($new_id) 
			{
				$msg[] = array('Insert Success','success');
				$sys->redirect($sys->mod['url_task'].'edit?id='.urlencode($new_id).'&return='.urlencode(@$_GET['return']),2);
			}else
			{
				$msg[] = array('Failed','danger');
			}
		}
	}else
	{
		$msg[] = array('Data Exist','warning');		
	}
}

$output['movies'] = $sys->db('SELECT `id`,`name` FROM `movie`','assoc');

include $sys->tpl('movie_series_edit');