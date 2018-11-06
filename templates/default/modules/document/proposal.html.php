<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'UKM '.$output['ukm']['name'].' '.$output['ukm']['periode'].' / '.($output['ukm']['periode']+1);
$sys->set_icon($output['ukm']['image']);
?>

<div class="col-xs-12">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">
				<a href="<?php echo $sys->path['url'].$session_user_type_mod; ?>" class="btn btn-success"><i class="fa fa-chevron-left"></i></a> 
				UKM <?php echo $output['ukm']['name']; ?> Periode <?php echo $output['ukm']['periode']; ?> / <?php echo $output['ukm']['periode']+1; ?>
			</h3>
		</div>
		<div class="panel-body">
			<?php 
			$col = (@$output['ukm']['image']) ? 9 : 12; 
			?>
			<?php 
			if(@$output['ukm']['image']) 
			{
				?>
				<div class="col-xs-12 col-sm-3">
					<img src="<?php echo $output['ukm']['image']; ?>" class="img-responsive" alt="Image">
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
								<td><?php echo $output['ukm']['name']; ?></td>
							</tr>
							<tr>
								<td>Address</td>
								<td>:</td>
								<td><?php echo $output['ukm']['params']['address']; ?></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td>:</td>
								<td><?php echo $output['ukm']['params']['phone']; ?></td>
							</tr>
							<tr>
								<td>Deskripsi</td>
								<td>:</td>
								<td><?php echo $output['ukm']['description']; ?></td>
							</tr>
							<tr>
								<td>Periode</td>
								<td>:</td>
								<td><?php echo $output['ukm']['periode']; ?></td>
							</tr>
							<tr>
								<td>APBU Used</td>
								<td>:</td>
								<td><?php echo number_format($output['ukm']['apbu_used']); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
if(@$output['document']) 
{
	if(count($output['document']['timeline']) == 5) 
	{
		?>
		<div class="col-xs-12">
			<?php echo msg('This Proposal has Finished','success'); ?>
		</div>
		<div class="col-xs-12">
			<?php echo msg('<a href="'.$sys->mod['url'].'proposal_lpj/'.$output['ukm']['periode_id'].'/'.$output['document']['proposal_id'].'"><i class="fa fa-book"></i> Review LPJ</a>','success'); ?>
		</div>
		<?php 
	}
	if($output['document']['id']==$output['proposal_history']['0']['id'] and $session_user_type_mod != 'ukm') 
	{
		?>
		<div class="col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Make a Decision</h3>
				</div>
				<div class="panel-body">
					<iframe src="<?php echo $sys->path['url'].$session_user_type_mod.'/decision/'.$output['document']['id']; ?>" style="border: 0; width: 100%; height: 300px;"></iframe>
				</div>
			</div>
		</div>
		<?php 
	}
	?>
	<div class="col-xs-12 col-sm-8">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title">
					<a href="<?php echo $sys->mod['url']; ?>proposal" class="btn btn-warning"><i class="fa fa-chevron-left"></i></a> 
					Document Detail Proposal <?php echo $output['proposal_detail']['name']; ?>
					<?php 
					if(@$output['document']['file']) 
					{
						?>
						<a href="<?php echo $output['document']['file']; ?>" target="blank" class="btn pull-right"><i class="fa fa-download"></i> Download File</a> 
						<?php 
					}
					?>
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<tbody>
							<tr>
								<td>APBU</td>
								<td>:</td>
								<td><?php echo number_format($output['document']['cost_apbu']); ?></td>
							</tr>
							<?php 
							if($output['document']['verify_wr3'] == 1) 
							{
								?>
								<tr>
									<td>APBU APPROVED</td>
									<td>:</td>
									<td><?php echo number_format($output['document']['verify_wr3_cost']); ?></td>
								</tr>
								<?php 
							}
							?>
							<tr>
								<td>Latar Belakang</td>
								<td>:</td>
								<td><?php echo $output['document']['params']['latar_belakang_masalah']; ?></td>
							</tr>
							<tr>
								<td>Tujuan</td>
								<td>:</td>
								<td><?php echo $output['document']['params']['tujuan']; ?></td>
							</tr>
							<tr>
								<td>Tempat</td>
								<td>:</td>
								<td><?php echo $output['document']['params']['tempat']; ?></td>
							</tr>
							<tr>
								<td>Waktu</td>
								<td>:</td>
								<td><?php echo $output['document']['params']['waktu']; ?></td>
							</tr>
							<tr>
								<td>Uploaded</td>
								<td>:</td>
								<td><?php echo $output['document']['created']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="<?php echo $sys->mod['url']; ?>proposal" class="btn btn-danger"><i class="fa fa-chevron-left"></i></a> 
				Document Timeline Proposal <?php echo $output['proposal_detail']['name']; ?>
			</div>
			<div class="panel-body">
				<div class="tree">
					<ul>
						<li>
							<a href="#">
								<h4>Document <?php echo $output['proposal_detail']['name']; ?></h4>
								<h6><?php echo $output['document']['created']; ?></h6>	
							</a>
							<ul>
								<?php 
								foreach ($output['document']['timeline'] as $key => $value) 
								{
									?>
									<li>
										<a href="#">
											<h5>
												<?php echo $value['date']; ?>
												<b><?php echo $value['user']; ?></b>
												<br>
												<?php echo $value['status']; ?>
											</h5>
											<h6 class="text-info"><?php echo $value['comment']; ?></h6>
										</a>
									</li>
									<?php 
								}
								?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Document Viewer Proposal <?php echo $output['proposal_detail']['name']; ?></h3>
			</div>
			<div class="panel-body">
				<?php 
				echo file_viewer($output['document']['file']);
				?>
			</div>
		</div>
	</div>
	<?php 
}
?>
<div class="col-xs-12 col-sm-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
				<a href="<?php echo $sys->path['url'].$session_user_type_mod; ?>" class="btn btn-info"><i class="fa fa-chevron-left"></i></a> 
				History Document Proposal <?php echo @$output['proposal_detail']['name']; ?>
			</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>APBU</th>
							<th>Uploaded</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($output['proposal_history'] as $key => $value) 
						{
							?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo number_format($value['cost_apbu']); ?></td>
								<td><?php echo $value['created']; ?></td>
								<td>
									<a href="<?php echo $value['url']; ?>" class="text-info"><i class="fa fa-book"></i></a>
								</td>
								<td>
									<?php 
									if($value['file']) 
									{
										?>
										<a href="<?php echo $value['file']; ?>" target="blank" class="text-success"><i class="fa fa-download"></i></a>
										<?php 
									}
									?>
								</td>
							</tr>
							<?php 
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="col-xs-6">
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="panel-title">
				<a href="<?php echo $sys->path['url'].$session_user_type_mod; ?>" class="btn btn-warning"><i class="fa fa-chevron-left"></i></a> 
				Proposal
			</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover" id="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Date</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($output['proposal'] as $key => $value) 
						{
							?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $value['name']; ?></td>
								<td><?php echo $value['created']; ?></td>
								<td>
									<a href="<?php echo $value['url']; ?>"><i class="fa fa-book"></i></a>
								</td>
							</tr>
							<?php 
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>