<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<a class="btn btn-primary" href="<?php echo $sys->mod['url_task']; ?>edit?return=<?php echo urlencode($sys->mod['url_current']); ?>">Add Movie</a>
<br>
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
					foreach ($output as $key => $value) 
					{
						?>
						<tr>
							<td>
								<img height="90px" width="auto" class="image_viewer" src="<?php echo $value['image'] ?>">
							</td>
							<td>
								<a href="<?php echo $value['id_url']; ?>" target="blank">
									<span class="<?php echo ($value['active']) ? 'text-success' : 'text-danger' ?>" >
										<?php echo $value['name']; ?>
									</span>
								</a>
								 /
								<a href="<?php echo $value['id_url_alt']; ?>" target="blank">
									<span class="<?php echo ($value['active']) ? 'text-success' : 'text-danger' ?>" >
										<?php echo $value['name_alt']; ?>
									</span>
								</a>
								<h5 class="text-muted"> Episodes : <?php echo $value['ep_last']; ?> of <?php echo $value['ep_total']; ?> </h5>
								<a href="<?php echo $sys->mod['url']; ?>movie_website?m_id=<?php echo urlencode($value['id']); ?>&return=<?php echo urlencode($sys->mod['url_current']); ?>" class="btn btn-info">Website</a>
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
