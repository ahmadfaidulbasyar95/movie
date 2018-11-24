<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<nav class="navbar no_border_radius <?php echo @$block['config']['add_class']; ?>" role="navigation" style="<?php echo @$block['config']['add_style']; ?>" >
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<i class="fa fa-bars"></i>
			</button>
			<?php $sys->block_show($block['title'].'_intro'); ?>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<?php $sys->block_show($block['title'].'_menu'); ?>
		</div>
	</div>
</nav>