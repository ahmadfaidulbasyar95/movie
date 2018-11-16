<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<div class="col-xs-12 no_padding movie_list">
	<?php 
	foreach ($output as $key => $value) 
	{
		?>
		<div class="col-xs-6 col-sm-4 col-md-3 padding_5 item">
			<a href="<?php echo $value['id_url']; ?>">
				<div class="col-xs-12 no_padding caption box_shadow">
					<div class="ratio_3-4">
						<img src="<?php echo $value['image']; ?>" class="ratio">
						<div class="ratio">
							<h5 class="no_margin padding_10 title"><?php echo $value['name']; ?><br><br></h5>
							<h5 class="no_margin padding_20 episode text-center"><?php echo $value['ep_last'].'/'.$value['ep_total']; ?></h5>
						</div>
					</div>
				</div>
			</a>
		</div>
		<?php 
	}
	?>
</div>