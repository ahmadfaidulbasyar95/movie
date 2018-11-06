<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Edit UKM</h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" placeholder="Name" name="name" required="required" value="<?php echo $output['name']; ?>">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control" rows="3" required="required"><?php echo $output['description']; ?></textarea>
			</div>
			<div class="form-group">
				<label>Image</label>
				<?php 
				if ($output['image']) 
				{
					?>
					<img src="<?php echo $output['image']; ?>" class="img-responsive" alt="Image" style="max-height: 200px;">
					<?php
				}
				?>
				<input type="file" class="form-control" placeholder="Image" name="image">
			</div>
			<div class="form-group">
				<label>Address</label>
				<input type="text" class="form-control" placeholder="Address" name="params[address]" required="required" value="<?php echo $output['params']['address']; ?>">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="tel" pattern="[0-9]{3} [0-9]{3} [0-9]{3} [0-9]{2,4}" maxlength="16" class="form-control" placeholder="082 327 064 384" name="params[phone]" required="required" value="<?php echo $output['params']['phone']; ?>">
				<small class="text-muted">ex : 082 327 064 384</small>
			</div>
			<a href="<?php echo $sys->mod['url_task']; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i></a>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>