<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<a class="btn btn-primary" href="<?php echo $sys->mod['url_task']; ?>edit?return=<?php echo urlencode($sys->mod['url_current']); ?>">New Series</a>
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
						<th>Series</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($output as $key => $value) 
					{
						?>
						<tr>
							<td><?php echo $value['movie']; ?></td>
							<td>
								<a href="<?php echo $sys->mod['url_task']; ?>edit?id=<?php echo urlencode($value['id']); ?>&return=<?php echo urlencode($sys->mod['url_current']); ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
								<a onclick="return confirm('Delete ?')" href="<?php echo $sys->mod['url_task']; ?>?id=<?php echo urlencode($value['id']); ?>&act=1" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
