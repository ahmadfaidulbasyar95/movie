<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<?php 
foreach ($output['list_periode'] as $key => $value) 
{
	?>
	<div class="col-xs-12 col-sm-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">
					<a href="<?php echo $value['url']; ?>">Periode <?php echo $value['periode']; ?> / <?php echo $value['periode']+1; ?></a>
				</h3>
			</div>
			<div class="panel-body">
				<?php 
				if($value['leader']) 
				{
					?>
					<?php 
					$col = (@$value['leader']['image']) ? 9 : 12; 
					?>
					<?php 
					if(@$value['leader']['image']) 
					{
						?>
						<div class="col-xs-12 col-sm-3">
							<img src="<?php echo $value['leader']['image']; ?>" class="img-responsive" alt="Image">
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
										<td><?php echo $value['leader']['name']; ?></td>
									</tr>
									<tr>
										<td>E-Mail</td>
										<td>:</td>
										<td><?php echo $value['leader']['email']; ?></td>
									</tr>
									<tr>
										<td>NIM</td>
										<td>:</td>
										<td><?php echo $value['leader']['params']['nim']; ?></td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>:</td>
										<td><?php echo $value['leader']['params']['phone']; ?></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td>
											<a href="<?php echo $value['url']; ?>" class="btn btn-info"><i class="fa fa-book"></i> Daftar Kegiatan</a>
											<a href="<?php echo $value['url_member']; ?>" class="btn btn-warning"><i class="fa fa-users"></i> Member</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<?php 
				}else
				{
					echo msg('Leader Data Unavailable');
				}
				?>
			</div>
		</div>
	</div>
	<?php 
}
?>