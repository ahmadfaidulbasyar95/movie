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
			<?php 
			if(array_key_exists(2, $sys->user_access) || array_key_exists(3, $sys->user_access) || array_key_exists(4, $sys->user_access) || array_key_exists(5, $sys->user_access)) 
			{
				?>
				<div class="form-group">
					<label>NIP</label>
					<input type="text" class="form-control" placeholder="NIP" name="params[nip]" required="required" value="<?php echo @$sys->user['params']['nip']; ?>">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="tel" pattern="[0-9]{3} [0-9]{3} [0-9]{3} [0-9]{2,4}" maxlength="16" class="form-control" placeholder="082 327 064 384" name="params[phone]" required="required" value="<?php echo @$sys->user['params']['phone']; ?>">
					<small class="text-muted">ex : 082 327 064 384</small>
				</div>
				<?php 
			}
			?>
			<?php
			if(array_key_exists(4, $sys->user_access) || array_key_exists(5, $sys->user_access)) 
			{
				?>
				<div class="form-group">
					<label>TTD</label>
					<?php 
					if (@$sys->user['params']['ttd']) 
					{
						?>
						<img src="<?php echo user_img($sys->user['params']['ttd']); ?>" class="img-responsive" alt="Image" style="max-height: 200px;">
						<input type="hidden" name="params_old[ttd]" value="<?php echo @$sys->user['params']['ttd']; ?>">
						<?php
					}
					?>
					<input type="hidden" name="params[ttd]" value="file|jpg,png,jpeg">
					<input type="file" class="form-control" placeholder="Image" name="ttd" >
				</div>
				<?php 
			}
			?>
			<?php 
			if(array_key_exists(1, $sys->user_access)) 
			{
				?>
				<div class="form-group">
					<label>NIM</label>
					<input type="text" class="form-control" placeholder="NIM" name="params[nim]" required="required" value="<?php echo @$sys->user['params']['nim']; ?>">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="tel" pattern="[0-9]{3} [0-9]{3} [0-9]{3} [0-9]{2,4}" maxlength="16" class="form-control" placeholder="082 327 064 384" name="params[phone]" required="required" value="<?php echo @$sys->user['params']['phone']; ?>">
					<small class="text-muted">ex : 082 327 064 384</small>
				</div>
				<?php 
			}
			?>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>