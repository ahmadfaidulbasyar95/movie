<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<div class="col-xs-12">
	<?php echo msg('<a href="'.$sys->mod['url'].'periode/'.$output['ukm']['periode_current'].'"><i class="fa fa-users"></i> Go to Member of '.$output['ukm']['name'].'</a>','info'); ?>
</div>
<?php 
if($output['edit']) 
{
	?>
	<?php 
	if(count($output['edit']['timeline']) == 3) 
	{
		?>
		<div class="col-xs-12">
			<?php echo msg('This LPJ has Finished','success'); ?>
		</div>
		<?php 
	}
	?>
	<div class="col-xs-12 col-sm-8">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title">
					<a href="<?php echo $sys->mod['url']; ?>proposal" class="btn btn-warning"><i class="fa fa-chevron-left"></i></a> 
					Document Detail LPJ <?php echo $output['detail']['name']; ?>
					<?php 
					if(@$output['edit']['file']) 
					{
						?>
						<a href="<?php echo $output['edit']['file']; ?>" target="blank" class="btn pull-right"><i class="fa fa-download"></i> Download File</a> 
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
								<td><?php echo number_format($output['edit']['cost_apbu']); ?></td>
							</tr>
							<?php 
							if($output['edit']['verify_wr3'] == 1) 
							{
								?>
								<tr>
									<td>APBU APPROVED</td>
									<td>:</td>
									<td><?php echo number_format($output['edit']['verify_wr3_cost']); ?></td>
								</tr>
								<?php 
							}
							?>
							<tr>
								<td>Latar Belakang</td>
								<td>:</td>
								<td><?php echo $output['edit']['params']['latar_belakang_masalah']; ?></td>
							</tr>
							<tr>
								<td>Tujuan</td>
								<td>:</td>
								<td><?php echo $output['edit']['params']['tujuan']; ?></td>
							</tr>
							<tr>
								<td>Tempat</td>
								<td>:</td>
								<td><?php echo $output['edit']['params']['tempat']; ?></td>
							</tr>
							<tr>
								<td>Waktu</td>
								<td>:</td>
								<td><?php echo $output['edit']['params']['waktu']; ?></td>
							</tr>
							<tr>
								<td>Uploaded</td>
								<td>:</td>
								<td><?php echo $output['edit']['created']; ?></td>
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
				Document Timeline LPJ <?php echo $output['detail']['name']; ?>
			</div>
			<div class="panel-body">
				<div class="tree">
					<ul>
						<li>
							<a href="#">
								<h4>Document <?php echo $output['detail']['name']; ?></h4>
								<h6><?php echo $output['edit']['created']; ?></h6>	
							</a>
							<ul>
								<?php 
								foreach ($output['edit']['timeline'] as $key => $value) 
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
				<h3 class="panel-title">Document Viewer LPJ <?php echo $output['detail']['name']; ?></h3>
			</div>
			<div class="panel-body">
				<?php 
				echo file_viewer($output['edit']['file']);
				?>
			</div>
		</div>
	</div>
	<?php 
}
?>
<div class="col-xs-12 col-sm-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">
				<a href="<?php echo $sys->mod['url']; ?>proposal" class="btn btn-success"><i class="fa fa-chevron-left"></i></a> 
				<?php echo (@$output['edit']['id']) ? 'Edit' : 'Add'; ?> Document LPJ <?php echo $output['detail']['name']; ?>
			</h3>
		</div>
		<div class="panel-body">
			<?php 
			echo msg($msg);
			?>
			<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				APBU : <?php echo number_format($output['detail']['total_apbu']); ?> / <?php echo number_format($output['detail']['max_apbu']); ?> <br>
				Available : <?php echo number_format($output['detail']['max_apbu'] - $output['detail']['total_apbu']); ?>
			</div>
			<form action="" method="POST" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Latar Belakang Masalah</label>
					<textarea class="form-control" name="params[latar_belakang_masalah]" required="required"><?php echo @$output['edit']['params']['latar_belakang_masalah']; ?></textarea>
				</div>
				<div class="form-group">
					<label for="">Tujuan</label>
					<textarea class="form-control" name="params[tujuan]" required="required"><?php echo @$output['edit']['params']['tujuan']; ?></textarea>
				</div>
				<div class="form-group">
					<label for="">Tempat</label>
					<input type="text" class="form-control" name="params[tempat]" required="required" value="<?php echo @$output['edit']['params']['tempat']; ?>">
				</div>
				<div class="form-group">
					<label for="">Waktu</label>
					<input type="date" class="form-control" name="params[waktu]" required="required" value="<?php echo @$output['edit']['params']['waktu']; ?>">
				</div>
				<div class="form-group">
					<label for="">APBU</label>
					<input type="number" class="form-control" name="cost_apbu" required="required" value="<?php echo @$output['edit']['cost_apbu']; ?>">
				</div>
				<div class="form-group">
					<label for="">File</label>
					<input type="file" class="form-control" name="file" <?php echo (@$output['edit']['id']) ? '' : 'required="required"'; ?><?php echo (!array_key_exists('add_required', (array)$msg)) ? '' : 'required="required"'; ?> >
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>
</div>
<div class="col-xs-12 col-sm-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
				<a href="<?php echo $sys->mod['url']; ?>proposal" class="btn btn-info"><i class="fa fa-chevron-left"></i></a> 
				History Document LPJ <?php echo $output['detail']['name']; ?>
			</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover" id="table">
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
						foreach ($output['history'] as $key => $value) 
						{
							?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo number_format($value['cost_apbu']); ?></td>
								<td><?php echo $value['created']; ?></td>
								<td>
									<a href="<?php echo $sys->mod['url_task'].$output['detail']['id'].'/edit/'.$value['id']; ?>" class="text-info"><i class="fa fa-book"></i></a>
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