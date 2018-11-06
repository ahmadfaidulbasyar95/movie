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
		<div>
			<?php echo $sys->content; ?>
		</div>
		<?php $sys->link_js($sys->template['url'].'js/script_def.js'); ?>
		<?php $sys->link_js($sys->template['url'].'js/template.js'); ?>
		<?php $sys->link_js($sys->template['url'].'js/datatables.min.js'); ?>
	</body>
</html>