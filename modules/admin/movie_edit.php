<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

$id       = @$_GET['id'];
$img_path = $sys->path['root'].'images/modules/movie/';

if ($id) 
{
	$output = $sys->db("SELECT * FROM `movie` WHERE `id`='$id'",'row');
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
	$ok                  = $ok_alt = 0;
	$_POST['id_url']     = urlencode(strtolower(@$_POST['name']));
	$_POST['id_url_alt'] = urlencode(strtolower(@$_POST['name_alt']));
	if ($output) 
	{
		if ($output['id_url'] == $_POST['id_url'] || $output['id_url_alt'] == $_POST['id_url']) $ok = 1;
		if ($output['id_url'] == $_POST['id_url_alt'] || $output['id_url_alt'] == $_POST['id_url_alt']) $ok_alt = 1;
	}
	if ($ok == 0) 
	{
		if (empty($sys->db('SELECT 1 FROM `movie` WHERE `id_url`="'.addslashes($_POST['id_url']).'" OR `id_url_alt`="'.addslashes($_POST['id_url']).'"','one'))) $ok = 1;
	}
	if ($ok_alt == 0) 
	{
		if (empty($sys->db('SELECT 1 FROM `movie` WHERE `id_url`="'.addslashes($_POST['id_url_alt']).'" OR `id_url_alt`="'.addslashes($_POST['id_url_alt']).'"','one'))) $ok_alt = 1;
	}
	if ($ok) 
	{
		if ($_POST['id_url'] == 'main') $ok = 0;
	}
	if ($ok_alt) 
	{
		if ($_POST['id_url_alt'] == 'main') $ok_alt = 0;
	}
	if ($ok and $ok_alt) 
	{
		if ($id) 
		{
			$id_tmp = $id;
		}else
		{
			$id_tmp      = id();
			$_POST['id'] = $id_tmp;
		}

		$img      = upload('image',$img_path,$id_tmp,'jpg,png,jpeg');

		if (@$_FILES['image']['name']) 
		{
			if ($img) 
			{
				$_POST['image'] = $img;
			}else
			{
				$msg[] = 'Image Not Allowed';
			}
		}
		if ($sys->db_update($_POST,'movie',$id)) 
		{
			if ($id) 
			{
				if (@$_POST['image'] and $output['image'] and $img != $output['image']) 
				{
					if (file_exists($img_path.$output['image'])) 
					{
						unlink($img_path.$output['image']);
					}
				}
				$output = $sys->db("SELECT * FROM `movie` WHERE `id`='$id'",'row');
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
		if ($ok     == 0) $msg[] = array('Data Exist','danger');
		if ($ok_alt == 0) $msg[] = array('Data Alternate Exist','danger');
	}
}

if ($output) 
{
	$output['image'] = admin_img($output['image'],'movie');
}

include $sys->tpl('movie_edit');
?>