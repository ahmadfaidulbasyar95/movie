<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'Configuration';
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Configuration</h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label>Max APBU</label>
				<input type="number" class="form-control" name="max_apbu" required="required" value="<?php echo get_config('max_apbu'); ?>">
			</div>
			<div class="form-group">
				<label>Nama Universitas</label>
				<input type="text" class="form-control" name="univ_name" required="required" value="<?php echo get_config('univ_name'); ?>">
			</div>
			<div class="form-group">
				<label>Alamat Universitas</label>
				<input type="text" class="form-control" name="univ_address" required="required" value="<?php echo get_config('univ_address'); ?>">
			</div>
			<div class="form-group">
				<label>Default Password Reset</label>
				<input type="text" class="form-control" name="def_password" required="required" value="<?php echo get_config('def_password'); ?>">
			</div>
			<div class="form-group">
				<label>Logo Universitas</label>
				<?php 
				$logo = get_config('logo');
				if($logo) 
				{
					?>
					<img src="<?php echo admin_img($logo); ?>" class="img-responsive" alt="Image">
					<?php 
				}
				?>
				<input type="file" class="form-control" name="logo">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>