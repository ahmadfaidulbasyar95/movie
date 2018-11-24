<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>

<ul class="nav navbar-nav">
	<li>
		<a> <?php echo $block['title']; ?> </a>
	</li>
	<?php 
	foreach ($output as $key => $value) 
	{
		?>
		<li><a href="<?php echo $value['link']; ?>"><i class="fa <?php echo $value['icon']; ?>"></i> <?php echo $value['name']; ?></a></li>
		<?php 
	}
	?>
</ul>