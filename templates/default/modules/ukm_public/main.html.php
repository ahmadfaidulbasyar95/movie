<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<?php 
foreach ($output as $key => $value) 
{
	?>
	<div class="col-xs-6 col-sm-4">
		<a href="<?php echo $value['url']; ?>">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $value['name']; ?></h3>
				</div>
				<div class="panel-body text-center">
					<?php 
					if($value['image']) 
					{
						?>
						<div class="col-xs-12 no_padding">
							<img src="<?php echo $value['image']; ?>" class="img-responsive center" alt="Image">
						</div>
						<?php 
					}
					?>
					<div class="col-xs-12 no_padding">
						<h5><i class="fa fa-phone"></i> <?php echo $value['params']['phone']; ?></h5>
						<h5><i class="fa fa-map-marker"></i> <?php echo $value['params']['address']; ?></h5>
						<h5 class="text-justify"><?php echo $value['description']; ?></h5>
					</div>
				</div>
			</div>
		</a>
	</div>
	<?php 
}
?>