<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'Profill';
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Profill</h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" placeholder="Username" name="usr" value="<?php echo $sys->user['username']; ?>" required="required">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $sys->user['email']; ?>" required="required">
			</div>
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $sys->user['name']; ?>" required="required">
			</div>
			<div class="form-group">
				<label>Image</label>
				<?php 
				if ($sys->user['image']) 
				{
					?>
					<img src="<?php echo $sys->user['image']; ?>" class="img-responsive" alt="Image" style="max-height: 200px;">
					<?php
				}
				?>
				<input type="file" class="form-control" placeholder="Image" name="image" >
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>