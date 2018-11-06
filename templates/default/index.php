<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<?php $sys->meta(); ?>
		<?php $sys->link_css($sys->template['url'].'css/style_def.css'); ?>
		<?php $sys->link_css($sys->template['url'].'css/template.css'); ?>
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
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
		<?php $sys->link_js($sys->template['url'].'js/script_def.js'); ?>
		<?php $sys->link_js($sys->template['url'].'js/template.js'); ?>
		<?php $sys->link_js($sys->template['url'].'js/datatables.min.js'); ?>
	</body>
</html>