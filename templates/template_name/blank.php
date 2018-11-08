<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<?php $sys->meta(); ?>
		<?php $sys->link_css($sys->template['url'].'css/style_custom.css'); ?>
	</head>
	<body>
		<div class="container">
			<?php echo $sys->content; ?>
		</div>
		<?php $sys->link_js($sys->template['url'].'js/script_custom.js'); ?>
	</body>
</html>