<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Profill <?php echo $output['name']; ?></h3>
	</div>
	<div class="">
		<?php 
		$col = (@$output['image']) ? 9 : 12; 
		?>
		<?php 
		if(@$output['image']) 
		{
			?>
			<div class="col-xs-12 col-sm-3 no_padding">
				<img src="<?php echo $output['image']; ?>" class="img-responsive center" alt="Image">
			</div>
			<?php 
		}
		?>
		<div class="col-xs-12 col-sm-<?php echo $col; ?> no_padding">
			<div class="table-responsive">
				<table class="table table-hover">
					<tbody>
						<tr>
							<td>NIP</td>
							<td>:</td>
							<td><?php echo @$output['params']['nip']; ?></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>:</td>
							<td><?php echo @$output['params']['phone']; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><?php echo $output['email']; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
