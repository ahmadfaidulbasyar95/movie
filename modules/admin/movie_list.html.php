<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<div class="text-center">
	<a class="btn btn-primary pull-left" href="<?php echo $sys->mod['url_task']; ?>edit?return=<?php echo urlencode($sys->mod['url_current']); ?>">Add Movie</a>
	<form action="" method="POST" class="form-inline pull-right" role="form">
		<div class="form-group">
			<input type="text" name="movie_url" class="form-control" placeholder="URL Movie To Edit">
		</div>
		<button type="submit" class="btn btn-primary"><i class="fa fa-send"></i></button>
	</form>
	<?php echo pagination($output['page'],$output['pages']); ?>
</div>
<br>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $sys->meta_title; ?></h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<div class="table-responsive">
			<table class="table table-hover">
				<tbody>
					<?php 
					foreach ($output['list'] as $key => $value) 
					{
						?>
						<tr>
							<td>
								<img height="120px" width="auto" class="image_viewer" src="<?php echo $value['image'] ?>">
							</td>
							<td>
								<a href="<?php echo $value['id_url']; ?>" <?php if($value['active']) echo 'target="_blank"' ?> >
									<span class="<?php echo ($value['active']) ? 'text-success' : 'text-danger' ?>" >
										<?php echo $value['name']; ?>
									</span>
								</a>
								 /
								<a href="<?php echo $value['id_url_alt']; ?>" <?php if($value['active']) echo 'target="_blank"' ?> >
									<span class="<?php echo ($value['active']) ? 'text-success' : 'text-danger' ?>" >
										<?php echo $value['name_alt']; ?>
									</span>
								</a>
								<h5 class="text-muted"> Episodes : <?php echo $value['ep_last']; ?> of <?php echo $value['ep_total']; ?> </h5>
								<h5>
									<span class="text-muted">Status : </span>
									<span class="<?php echo ($value['status']==1) ? 'text-info' : 'text-success' ?>">
										<?php echo ($value['status']==1) ? 'On Going' : 'Completed' ?>
									</span>
								</h5>
								<a href="<?php echo $sys->mod['url']; ?>movie_website?m_id=<?php echo urlencode($value['id']); ?>&return=<?php echo urlencode($sys->mod['url_current']); ?>" class="btn btn-info"><i class="fa fa-chrome"></i></a>
								<a href="<?php echo $sys->mod['url_task']; ?>edit?id=<?php echo urlencode($value['id']); ?>&return=<?php echo urlencode($sys->mod['url_current']); ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
								<a onclick="return confirm('Delete ?')" href="<?php echo $sys->mod['url_task']; ?>?id=<?php echo urlencode($value['id']); ?>&act=1" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								<a href="<?php echo $sys->mod['url']; ?>movie_tags?m_id=<?php echo urlencode($value['id']); ?>&return=<?php echo urlencode($sys->mod['url_current']); ?>" class="btn btn-info"><i class="fa fa-tag"></i></a>
							</td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="text-center">
	<?php echo pagination($output['page'],$output['pages']); ?>
</div>
