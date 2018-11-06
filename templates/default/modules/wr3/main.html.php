<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<?php 
foreach ($output as $key => $value) 
{
	?>
	<div class="col-xs-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $value['ukm']['name']; ?></h3>
			</div>
			<div class="panel-body">
				<?php 
				$col = (@$value['ukm']['image']) ? 9 : 12; 
				?>
				<?php 
				if(@$value['ukm']['image']) 
				{
					?>
					<div class="col-xs-12 col-sm-3">
						<img src="<?php echo $value['ukm']['image']; ?>" class="img-responsive" alt="Image">
					</div>
					<?php 
				}
				?>
				<div class="col-xs-12 col-sm-<?php echo $col; ?>">
					<div class="table-responsive">
						<table class="table table-hover">
							<tbody>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?php echo $value['ukm']['name']; ?></td>
								</tr>
								<tr>
									<td>Address</td>
									<td>:</td>
									<td><?php echo $value['ukm']['params']['address']; ?></td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>:</td>
									<td><?php echo $value['ukm']['params']['phone']; ?></td>
								</tr>
								<tr>
									<td>Deskripsi</td>
									<td>:</td>
									<td><?php echo $value['ukm']['description']; ?></td>
								</tr>
								<tr>
									<td>Periode</td>
									<td>:</td>
									<td>
										<?php 
										$x = array();
										foreach ($value['periode'] as $key1 => $value1) 
										{
											$x[] = '<a href="'.$value1['url'].'" class="btn btn-success">
																'.$value1['periode'].' / '.($value1['periode']+1).'
															</a>';
										}
										echo implode(' ', $x);
										?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
}
?>