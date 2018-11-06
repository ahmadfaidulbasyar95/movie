<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'Change Password';
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Change Password</h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form">
		<div class="form-group">
			<label for="">New Password</label>
			<input type="text" class="form-control" placeholder="Password" name="pwd" required="required">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Re-Password" name="re_pwd" required="required">
		</div>
		<div class="form-group">
			<label for="">Old Password</label>
			<input type="text" class="form-control" placeholder="Password" name="pwd_old" required="required">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
</div>