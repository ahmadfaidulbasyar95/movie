<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'Add Periode UKM '.$output['ukm'];
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Add Periode UKM <?php echo $output['ukm']; ?></h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label>Periode</label>
				<input value="<?php echo $output['last']['periode']+1; ?>" type="number" class="form-control" min="1500" max="9999" placeholder="Periode" name="periode" required="required">
			</div>
			<div class="form-group">
				<label>Pembina</label>
				<select name="pembina" class="form-control" required="required">
					<?php 
					foreach ($output['pembina'] as $key => $value) 
					{
						?>
						<option <?php if($output['last']['pembina_id']==$value['id']) echo 'selected="selected"'; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?> (<?php echo $value['username']; ?>)</option>
						<?php 
					}
					?>
				</select>
			</div>
			<legend>Leader</legend>
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
			<a href="<?php echo $output['return']; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i></a>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>