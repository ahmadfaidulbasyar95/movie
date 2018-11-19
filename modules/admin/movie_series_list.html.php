<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<div class="text-center">
	<a class="btn btn-primary pull-left" href="<?php echo $sys->mod['url_task']; ?>edit?return=<?php echo urlencode($sys->mod['url_current']); ?>">New Series</a>
	<form action="" method="POST" class="form-inline pull-right" role="form">
		<div class="form-group">
			<input type="text" name="movie_url" class="form-control" placeholder="URL Movie To Edit Series">
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
				<thead>
					<tr>
						<th>Series</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($output['list'] as $key => $value) 
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
<div class="text-center">
	<?php echo pagination($output['page'],$output['pages']); ?>
</div>