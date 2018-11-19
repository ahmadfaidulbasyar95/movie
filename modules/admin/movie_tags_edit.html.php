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
				<?php 
				if($m_id and array_key_exists($m_id, $output['movies'])) 
				{
					?>
					<input type="hidden" name="movie_id" value="<?php echo $m_id; ?>">
					<p><?php echo $output['movies'][$m_id]['name']; ?></p>
					<?php 
				}else
				{
					?>
					<select name="movie_id" class="form-control select_autocomplete" required="required" placeholder="Search Movie">
						<option value="">Search Movie</option>
						<?php 
						foreach ($output['movies'] as $key => $value) 
						{
							?>
							<option value="<?php echo $key; ?>" <?php if($key == @$output['movie_id']) echo 'selected="selected"' ?> ><?php echo $value['name']; ?></option>
							<?php 
						}
						?>
					</select>
					<?php 
				}
				?>
			</div>
			<div class="form-group">
				<label>Tag</label>
				<?php 
				if($t_id and array_key_exists($t_id, $output['tags'])) 
				{
					?>
					<input type="hidden" name="tag_id" value="<?php echo $t_id; ?>">
					<p><?php echo $output['tags'][$t_id]['name']; ?></p>
					<?php 
				}else
				{
					?>
					<select name="tag_id" class="form-control" required="required">
						<?php 
						foreach ($output['tags'] as $key => $value) 
						{
							?>
							<option value="<?php echo $key; ?>" <?php if($key == @$output['tag_id']) echo 'selected="selected"' ?> ><?php echo $value['name']; ?></option>
							<?php 
						}
						?>
					</select>
					<?php 
				}
				?>
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