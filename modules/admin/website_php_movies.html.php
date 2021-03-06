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
			<a class="btn btn-warning" data-toggle="modal" href='#modal-php_movies'>Format Request</a>
			<div class="modal fade" id="modal-php_movies">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Format Request</h4>
						</div>
						<div class="modal-body">
							<?php 
							pr(array(
									array(
										'link'  => '[LINK]',
										'title' => '[TITLE]'
										),
									array(
										'link'  => '[LINK]',
										'title' => '[TITLE]'
										)
									)
								);
							?>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-body">
		<iframe src="images/a.png" width="100%" height="600px" frameborder="0" name="php_movies"></iframe>
	</div>
</div>