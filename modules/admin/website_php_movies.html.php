<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $sys->meta_title; ?></h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form" enctype="multipart/form-data" target="php_movies">
			<div class="form-group">
				<textarea name="php_movies" class="form-control" rows="10" required="required"><?php echo @$output['php_movies']; ?></textarea>
			</div>
			<?php 
			if(@$_GET['return']) 
			{
				?>
				<a class="btn btn-default" href="<?php echo $_GET['return']; ?>"><i class="fa fa-chevron-left"></i></a>
				<?php 
			}
			?>
			<button type="submit" class="btn btn-info" name="act" value="preview">Execute</button>
			<button type="submit" class="btn btn-primary" name="act" value="save" onclick="return confirm('Save ?');">Submit</button>
		</form>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-body">
		<iframe src="images/a.png" width="100%" height="600px" frameborder="0" name="php_movies"></iframe>
	</div>
</div>