<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<?php $sys->meta(); ?>
		<?php $sys->link_css($sys->template['url'].'css/style_custom.css'); ?>
	</head>
	<body>
		<div id="page" class="center" <?php if(empty($sys->blocks_editor)) echo 'style="background-image: url(\''.admin_img(get_config('background')).'\');"'; ?> >
			<nav class="navbar no_border_radius" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<i class="fa fa-bars"></i>
						</button>
						<?php $sys->block_show('intro'); ?>
					</div>
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<?php $sys->block_show('header'); ?>
					</div>
				</div>
			</nav>
			<div class="container">
				<?php echo $sys->content; ?>
			</div>
			<?php $sys->block_show('web_view'); ?>
		</div>
		<?php $sys->link_js($sys->template['url'].'js/script_custom.js'); ?>
	</body>
</html>