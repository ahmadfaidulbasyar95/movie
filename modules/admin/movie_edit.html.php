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
				<label>Name</label>
				<input type="text" class="form-control" name="name" required="required" value="<?php echo @$output['name']; ?>">
			</div>
			<div class="form-group">
				<label>Name Alternate</label>
				<input type="text" class="form-control" name="name_alt" required="required" value="<?php echo @$output['name_alt']; ?>">
			</div>
			<div class="form-group">
				<label>Episodes</label>
				<input type="text" class="form-control" name="ep_total" required="required" value="<?php echo @$output['ep_total']; ?>">
			</div>
			<div class="form-group">
				<label>Sinopsis</label>
				<textarea name="sinopsis" class="form-control" rows="3" required="required"><?php echo @$output['sinopsis']; ?></textarea>
			</div>
			<div class="form-group">
				<label>Active</label>
				<div class="radio">
					<label>
						<input type="radio" name="active" value="1" <?php if(@$output['active']==1) echo 'checked="checked"' ?> >
						Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</label>
					<label>
						<input type="radio" name="active" value="0" <?php if(@$output['active']==0) echo 'checked="checked"' ?> >
						no
					</label>
				</div>
			</div>
			<div class="form-group">
				<label>Status</label>
				<div class="radio">
					<label>
						<input type="radio" name="status" value="1" <?php if(@$output['status']==1 || empty(@$output['status'])) echo 'checked="checked"' ?> >
						On Going &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</label>
					<label>
						<input type="radio" name="status" value="2" <?php if(@$output['status']==2) echo 'checked="checked"' ?> >
						Completed
					</label>
				</div>
			</div>
			<div class="form-group">
				<label>Image (3:4)</label>
				<?php 
				if(@$output['image']) 
				{
					?>
					<br>
					<img height="300px" width="auto" class="image_viewer" src="<?php echo $output['image']; ?>" >
					<?php 
				}
				?>
				<input type="file" name="image" class="form-control" value="" >
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