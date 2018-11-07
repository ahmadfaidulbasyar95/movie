<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $sys->meta_title; ?></h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" required="required" value="<?php echo @$output['name']; ?>">
			</div>
			<div class="form-group">
				<label>URL</label>
				<input type="text" class="form-control" name="url" required="required" value="<?php echo @$output['url']; ?>">
			</div>
			<?php 
			if(@$_GET['return']) 
			{
				?>
				<a class="btn btn-default" href="<?php echo $_GET['return']; ?>"><i class="fa fa-chevron-left"></i></a>
				<?php 
			}
			?>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>