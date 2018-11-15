<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<div>
	<?php 
	foreach ($output as $key => $value) 
	{
		?>
		<a class="btn btn-info" href="<?php echo $value['id_url']; ?>">
			<i class="fa fa-tag"></i>
			<span><?php echo $value['name']; ?></span>
		</a>
		<?php 
	}
	?>
</div>