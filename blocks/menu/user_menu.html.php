<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>

<ul class="nav navbar-nav navbar-right">
	<li class="dropdown">
		<?php 
		if(@$sys->user['id']) 
		{
			?>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<b class="fa fa-user"></b> <?php echo $sys->user['name']; ?> 
				( <?php echo array_values($sys->user_access)['0']; ?> ) 
				<b class="fa fa-caret-down"></b>
			</a>
			<ul class="dropdown-menu">
				<?php 
				if($sys->user['image']) 
				{
					?>
					<li class="padding_20">
						<img src="<?php echo $sys->user['image']; ?>" class="img-responsive avatar" alt="Image">
					</li>
					<?php 
				}
				?>
				<?php 
				foreach ($output as $key => $value) 
				{
					?>
					<li><a href="<?php echo $value['link']; ?>"><i class="fa <?php echo $value['icon']; ?>"></i> <?php echo $value['name']; ?></a></li>
					<?php 
				}
				?>
			</ul>
			<?php 
		}else
		{
			?>
			<a href="<?php echo $sys->path['url'].'user/login'; ?>" >
				Login
			</a>
			<?php
		}
		?>
	</li>
</ul>