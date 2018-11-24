<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

echo $block['title'];

if(@$block['config']['is_url']) 
{
	?>
	<a href="<?php echo $output['url']; ?>">
		<img src="<?php echo $output['image']; ?>" class="img-responsive" alt="Image" style="height: 50px;">
	</a>
	<?php 
}else
{
	?>
	<img src="<?php echo $output['image']; ?>" class="img-responsive" alt="Image" style="height: 50px;">
	<?php 
}
?>