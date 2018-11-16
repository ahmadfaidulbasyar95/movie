<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<div class="col-xs-12 no_padding movie_detail_overview box_shadow bg_white_transparent margin_15_b">
	<div class="col-xs-12 col-sm-4 no_padding">
		<div class="ratio_3-4">
			<img src="<?php echo $output['image']; ?>" class="ratio image_viewer">
		</div>
	</div>
	<div class="col-xs-12 col-sm-8 padding_15">
		<h5 class="text-muted">Name :</h5>
		<h4><?php echo $output['name']; ?></h4>
		<h5 class="text-muted">Name Alternate :</h5>
		<h4><?php echo $output['name_alt']; ?></h4>
		<h5 class="text-muted">Episodes :</h5>
		<h4><?php echo $output['ep_last'].'/'.$output['ep_total']; ?></h4>
		<h5 class="text-muted">Status :</h5>
		<h4 class="<?php echo ($output['status']==1) ? 'text-info' : 'text-success' ?>"><?php echo ($output['status']==1) ? 'On Going' : 'Completed' ?></h4>
		<?php 
		if($output['tags']) 
		{
			?>
			<h5 class="text-muted">Tags :</h5>
			<h5>
				<?php 
				foreach ($output['tags'] as $key => $value) 
				{
					?>
					<a class="btn btn-default" href="<?php echo $value['id_url']; ?>">
						<i class="fa fa-tag"></i>
						<span> <?php echo $value['name']; ?> </span>
					</a>
					<?php 
				}
				?>
			</h5>
			<?php 
		}
		if($output['series']) 
		{
			?>
			<h5 class="text-muted">Other Series :</h5>
			<h5>
				<?php 
				foreach ($output['series'] as $key => $value) 
				{
					?>
					<a class="btn btn-default" href="<?php echo $value['id_url']; ?>">
						<i class="fa fa-film"></i>
						<span> <?php echo $value['name']; ?> </span>
					</a>
					<?php 
				}
				?>
			</h5>
			<?php 
		}
		?>
		<h5 class="text-muted">Sinopsis :</h5>
		<article class="text-justify"><?php echo $output['sinopsis']; ?></article>
	</div>
</div>
<div class="col-xs-12 padding_15 movie_detail_episodes box_shadow bg_white_transparent margin_15_b">
	<h4>Episodes</h4>
	<br>
	<?php 
	foreach ($output['website'] as $key => $value) 
	{
		?>
		<div class="panel panel-default">
		  <a data-toggle="collapse" href="#episodes_website<?php echo $key; ?>" class="collapsed">
				<div class="panel-heading">
					<h3 class="panel-title">
						<?php echo $value['name']; ?>
						<i class="fa fa-chevron-down pull-right"></i>
					</h3>
				</div>
			</a>
			<div class="panel-body collapse" id="episodes_website<?php echo $key; ?>">
				<?php 
				foreach ($value['episodes'] as $key1 => $value1) 
				{
					?>
					<a class="btn btn-default margin_15_b" target="_blank" href="<?php echo $value1['link']; ?>">
						<i class="fa fa-video-camera"></i>
						<span> <?php echo $value1['eps']; ?> </span>
					</a>
					<?php 
				}
				?>
			</div>
		</div>
		<?php 
	}
	?>
</div>