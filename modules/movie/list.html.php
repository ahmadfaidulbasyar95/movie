<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<div class="col-xs-12 no_padding">
	<?php 
	foreach ($output as $key => $value) 
	{
		?>
		<div class="col-xs-6 col-sm-4 col-md-3 padding_5">
			<div class="col-xs-12 no_padding">
				<div class="ratio_3-4">
					<img src="<?php echo $value['image']; ?>" class="ratio">
				</div>
				<h5 class="ratio no_margin padding_10"><?php echo $value['name']; ?></h5>
			</div>
		</div>
		<?php 
	}
	?>
</div>