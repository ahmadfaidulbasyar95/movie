<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'WR3 Register';
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">WR3 Register</h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" placeholder="Username" name="usr" required="required">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" class="form-control" placeholder="Password" name="pwd" required="required">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Re-Password" name="re_pwd" required="required">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" placeholder="Email" name="email" required="required">
			</div>
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" placeholder="Name" name="name" required="required">
			</div>
			<div class="form-group">
				<label>Image</label>
				<input type="file" class="form-control" placeholder="Image" name="image">
			</div>
			<div class="form-group">
				<label>NIP</label>
				<input type="text" class="form-control" placeholder="NIP" name="params[nip]" required="required">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="tel" pattern="[0-9]{3} [0-9]{3} [0-9]{3} [0-9]{2,4}" maxlength="16" class="form-control" placeholder="082 327 064 384" name="params[phone]" required="required">
				<small class="text-muted">ex : 082 327 064 384</small>
			</div>
			<div class="form-group">
				<label>TTD</label>
				<input type="hidden" name="params[ttd]" value="file|jpg,png,jpeg">
				<input type="file" class="form-control" placeholder="Image" name="ttd" >
			</div>
			<a href="<?php echo $sys->mod['url_task']; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i></a>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>