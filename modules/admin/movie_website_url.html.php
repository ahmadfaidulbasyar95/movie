<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $sys->meta_title; ?></h3>
	</div>
	<div class="panel-body">
		<?php echo msg($msg); ?>
		<form action="" method="POST" role="form" enctype="multipart/form-data" target="php_episodes">
			<div class="form-group">
				<?php 
				if($output['url']) 
				{
					?>
					<a href="<?php echo $output['url']; ?>" target="_blank"><?php echo $output['url']; ?></a>
					<?php 
				}
				?>
			</div>
			<div class="form-group">
				<select name="url" class="form-control" required="required">
					<?php 
					foreach ((array)php_run($output['php_movies']) as $key => $value) 
					{
						if(!is_url(@$value['link'])) $value['link'] = $output['w_url'].@$value['link'];
						?>
						<option value="<?php echo @$value['link']; ?>" <?php if(@$value['link']==$output['url']) echo 'selected="selected"'; ?> ><?php echo @$value['title']; ?></option>
						<?php 
					}
					?>
				</select>
			</div>
			<?php 
			if(@$_GET['return']) 
			{
				?>
				<a class="btn btn-default" href="<?php echo $_GET['return']; ?>"><i class="fa fa-chevron-left"></i></a>
				<?php 
			}
			?>
			<button type="submit" class="btn btn-info" name="act" value="test" >Test Result</button>
			<button type="submit" class="btn btn-primary" name="act" value="save" onclick="return confirm('Save ?');">Submit</button>
		</form>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-body">
		<iframe src="images/a.png" width="100%" height="600px" frameborder="0" name="php_episodes"></iframe>
	</div>
</div>