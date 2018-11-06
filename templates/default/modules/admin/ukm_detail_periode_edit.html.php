<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'Edit Periode UKM '.$output['ukm'].' '.$output['periode'];
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Edit Periode UKM <?php echo $output['ukm'].' '.$output['periode']; ?></h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label>Periode</label>
				<input value="<?php echo $output['data']['periode']; ?>" type="number" class="form-control" min="1500" max="9999" placeholder="Periode" name="periode" required="required">
			</div>
			<div class="form-group">
				<label>Pembina</label>
				<select name="pembina" class="form-control" required="required">
					<?php 
					foreach ($output['pembina'] as $key => $value) 
					{
						?>
						<option <?php if($output['data']['user_pembina_id']==$value['id']) echo 'selected="selected"'; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?> (<?php echo $value['username']; ?>)</option>
						<?php 
					}
					?>
				</select>
			</div>
			<a href="<?php echo $output['return']; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i></a>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>