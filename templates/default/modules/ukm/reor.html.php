<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'Reorganisasi UKM '.$output['ukm']['name'];
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Reorganisasi UKM <?php echo $output['ukm']['name']; ?></h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<legend>New Leader</legend>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" placeholder="Username" name="leader[usr]" required="required">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" class="form-control" placeholder="Password" name="leader[pwd]" required="required">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Re-Password" name="leader[re_pwd]" required="required">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" placeholder="Email" name="leader[email]" required="required">
			</div>
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" placeholder="Name" name="leader[name]" required="required">
			</div>
			<div class="form-group">
				<label>Image</label>
				<input type="file" class="form-control" placeholder="Image" name="image">
			</div>
			<div class="form-group">
				<label>NIM</label>
				<input type="text" class="form-control" placeholder="NIM" name="leader[params][nim]" required="required">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="tel" pattern="[0-9]{3} [0-9]{3} [0-9]{3} [0-9]{2,4}" maxlength="16" class="form-control" placeholder="082 327 064 384" name="leader[params][phone]" required="required">
				<small class="text-muted">ex : 082 327 064 384</small>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>