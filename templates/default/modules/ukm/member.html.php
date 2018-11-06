<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<div class="col-xs-12 col-sm-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo (@$output['edit']['id']) ? 'Edit' : 'Add'; ?> Member</h3>
		</div>
		<div class="panel-body">
			<?php 
			echo msg($msg);
			?>
			<form action="" method="POST" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Position</label>
					<input type="text" class="form-control" placeholder="Position" name="position" required="required" value="<?php echo @$output['edit']['position']; ?>">
				</div>
				<div class="form-group">
					<label for="">NIM</label>
					<input type="text" class="form-control" placeholder="NIM" name="nim" required="required" value="<?php echo @$output['edit']['nim']; ?>">
				</div>
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" class="form-control" placeholder="Name" name="name" required="required" value="<?php echo @$output['edit']['name']; ?>">
				</div>
				<div class="form-group">
					<label for="">Image</label>
					<?php 
					if(@$output['edit']['image']) 
					{
						?>
						<img src="<?php echo $output['edit']['image']; ?>" class="img-responsive" alt="Image">
						<?php 
					}
					?>
					<input type="file" class="form-control" placeholder="Image" name="image" >
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
				<?php 
				if(@$output['edit']['id']) 
				{
					?>
					<a href="<?php echo $sys->mod['url_task'].'delete/'.$output['edit']['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
					<?php 
				}
				?>
			</form>
		</div>
	</div>
</div>
<div class="col-xs-12 col-sm-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Struktur Organisasi</h3>
		</div>
		<div class="panel-body">
			<div class="tree">
				<ul>
					<li>
						<a href="#" class="text-center">
							<?php 
							if($sys->user['image']) 
							{
								?>
								<img src="<?php echo $sys->user['image']; ?>" class="img-responsive" alt="Image">
								<?php 
							}
							?>
							<div class="pull-right">
								<h5>Leader</h5>
								<h5><b><?php echo @$sys->user['params']['nim']; ?></b></h5>
								<h5><?php echo $sys->user['name']; ?></h5>
							</div>
						</a>
						<?php echo ukm_member_tree($output['member']); ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php 
function ukm_member_tree($data=array(),$par_id='0')
{
	global $sys;
	$output = '<ul>';
	$output .= '
					<li>
						<a href="'.$sys->mod['url_task'].'add/'.$par_id.'"><i class="fa fa-plus"></i> Add</a>
					</li>
					';
	foreach ($data as $key => $value) 
	{
		if ($value['par_id'] == $par_id) 
		{
			$img = ($value['image']) ? '<img src="'.$value['image'].'" class="img-responsive" alt="Image">' : '';
			$output .= '
			<li>
				<a href="'.$sys->mod['url_task'].'edit/'.$value['id'].'" class="text-center">
					'.$img.'
					<div class="pull-right">
						<h5>'.$value['position'].'</h5>
						<h5><b>'.$value['nim'].'</b></h5>
						<h5>'.$value['name'].'</h5>
					</div>
				</a>
				'.ukm_member_tree($data,$value['id']).'
			</li>
			';
		}
	}
	$output .= '</ul>';
	return $output;
}
 ?>