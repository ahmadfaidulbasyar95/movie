<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<a class="btn btn-primary" href="<?php echo $sys->mod['url_task']; ?>edit?return=<?php echo urlencode($sys->mod['url_current']); ?>">Add Website</a>
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
				<thead>
					<tr>
						<th>Name</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($output as $key => $value) 
					{
						?>
						<tr>
							<td>
								<a target="_blank" href="<?php echo $value['url']; ?>">
									<span class="<?php echo ($value['active']) ? 'text-success' : 'text-danger' ?>" >
										<?php echo $value['name']; ?>
									</span>
								</a>
							</td>
							<td>
								<a href="<?php echo $sys->mod['url']; ?>movie_website?w_id=<?php echo urlencode($value['id']); ?>&return=<?php echo urlencode($sys->mod['url_current']); ?>" class="btn btn-info"><i class="fa fa-film"></i></a>
								<a href="<?php echo $sys->mod['url_task']; ?>edit?id=<?php echo urlencode($value['id']); ?>&return=<?php echo urlencode($sys->mod['url_current']); ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
								<a onclick="return confirm('Delete ?')" href="<?php echo $sys->mod['url_task']; ?>?id=<?php echo urlencode($value['id']); ?>&act=1" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								<a href="<?php echo $sys->mod['url_task']; ?>php_movies?id=<?php echo urlencode($value['id']); ?>&return=<?php echo urlencode($sys->mod['url_current']); ?>" class="btn btn-info"><i class="fa fa-code"></i> Movies</a>
								<a href="<?php echo $sys->mod['url_task']; ?>php_episodes?id=<?php echo urlencode($value['id']); ?>&return=<?php echo urlencode($sys->mod['url_current']); ?>" class="btn btn-info"><i class="fa fa-code"></i> Episodes</a>
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
