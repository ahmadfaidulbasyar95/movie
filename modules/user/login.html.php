<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'Login';
?>
<div class="container_mini">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Login</h3>
		</div>
		<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Username" name="usr" required="required">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Password" name="pwd" required="required">
			</div>
			<button type="submit" class="btn btn-info">Login</button>
		</form>
		</div>
	</div>
</div>