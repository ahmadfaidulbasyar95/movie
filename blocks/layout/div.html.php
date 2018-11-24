<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<div class="<?php echo @$block['config']['add_class']; ?>" style="<?php echo @$block['config']['add_style']; ?>">
	<?php $sys->block_show($block['title']); ?>
</div>