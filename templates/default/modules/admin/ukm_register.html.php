<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'UKM Register';
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">UKM Register</h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" placeholder="Name" name="name" required="required">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control" rows="3" required="required"></textarea>
			</div>
			<div class="form-group">
				<label>Image</label>
				<input type="file" class="form-control" placeholder="Image" name="image">
			</div>
			<div class="form-group">
				<label>Address</label>
				<input type="text" class="form-control" placeholder="Address" name="params[address]" required="required">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="tel" pattern="[0-9]{3} [0-9]{3} [0-9]{3} [0-9]{2,4}" maxlength="16" class="form-control" placeholder="082 327 064 384" name="params[phone]" required="required">
				<small class="text-muted">ex : 082 327 064 384</small>
			</div>
			<a href="<?php echo $sys->mod['url_task']; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i></a>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>