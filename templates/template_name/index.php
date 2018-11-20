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
			<?php $sys->block_show('web_view'); ?>
		</div>
		<?php $sys->link_js($sys->template['url'].'js/script_custom.js'); ?>
	</body>
</html>