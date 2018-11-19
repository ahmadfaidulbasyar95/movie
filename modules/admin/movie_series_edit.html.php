<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $sys->meta_title; ?></h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label>Movie</label>
				<select name="movie_id" class="form-control select_autocomplete" required="required" placeholder="Search Movie">
					<option value="">Search Movie</option>
					<?php 
					foreach ($output['movies'] as $key => $value) 
					{
						?>
						<option value="<?php echo $key; ?>" ><?php echo $value['name']; ?></option>
						<?php 
					}
					?>
				</select>
			</div>
			<?php 
			if(@$_GET['return']) 
			{
				?>
				<a class="btn btn-default" href="<?php echo $_GET['return']; ?>"><i class="fa fa-chevron-left"></i></a>
				<?php 
			}
			?>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
<?php 
if($id) 
{
	?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">List Movies</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Movie</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($output['series'] as $key => $value) 
						{
							?>
							<tr>
								<td><?php echo $output['movies'][$value]['name']; ?></td>
								<td>
								<a onclick="return confirm('Delete ?')" href="<?php echo $sys->mod['url_task']; ?>edit?id=<?php echo urlencode($id); ?>&del_id=<?php echo urlencode($value); ?>&return=<?php echo urlencode($sys->mod['url_current']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
	<?php 
}
?>