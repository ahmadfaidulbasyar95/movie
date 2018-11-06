<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
// pr($output);
?>
<form action="" method="POST" class="form-inline text-center" role="form">
	<div class="form-group">
		<label><h3>Data UKM</h3></label>
	</div>
	<button type="submit" class="btn btn-info" name="ukm" value="1"><i class="fa fa-print"></i></button>
</form>
<br>
<table class="table table-bordered table-striped table-hover" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Logo</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Status</th>
			<th>Print</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($output['ukm'] as $key => $value) 
		{
			?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td>
					<?php 
					if($value['image']) 
					{
						?>
						<img src="<?php echo $value['image']; ?>" class="img-responsive" alt="Image" style="height: 35px;">
						<?php 
					}
					?>
				</td>
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['params']['address']; ?></td>
				<td><?php echo ($value['active']) ? 'Aktif' : 'Tidak Aktif' ; ?></td>
				<td><a class="btn btn-info" data-toggle="modal" href='#anggota-<?php echo $key; ?>'>Anggota</a></td>
			</tr>
			<?php 
		}
		?>
	</tbody>
</table>
<?php 
if(isset($_POST['ukm'])) 
{
	?>
	<div id="print_member">
		<div class="col-xs-12">
			<?php 
			$univ_logo = admin_img(get_config('logo'));
			$col = ($univ_logo) ? 9 : 12 ;
			?>
			<?php 
			if($univ_logo) 
			{
				?>
				<div class="col-xs-3">
					<img src="<?php echo $univ_logo; ?>" class="img-responsive" alt="Image">
				</div>
				<?php 
			}
			?>
			<div class="col-xs-<?php echo $col; ?> text-center">
				<h4>DATA UKM</h4>
				<h4><?php echo get_config('univ_name'); ?></h4>
				<h5><?php echo get_config('univ_address'); ?></h5>
			</div>
		</div>
		<div class="col-xs-12" style="padding: 0;">
			<hr>
		</div>
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Logo</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($output['ukm'] as $key => $value) 
				{
					?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td>
							<?php 
							if($value['image']) 
							{
								?>
								<img src="<?php echo $value['image']; ?>" class="img-responsive" alt="Image" style="height: 35px;">
								<?php 
							}
							?>
						</td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['params']['address']; ?></td>
						<td><?php echo ($value['active']) ? 'Aktif' : 'Tidak Aktif' ; ?></td>
					</tr>
					<?php 
				}
				?>
			</tbody>
		</table>
	</div>
	<?php 
}
?>
<?php 
if(@$output['member']) 
{
	?>
	<div id="print_member">
		<div class="col-xs-12">
			<?php 
			$univ_logo = admin_img(get_config('logo'));
			$col = ($univ_logo) ? 9 : 12 ;
			?>
			<?php 
			if($univ_logo) 
			{
				?>
				<div class="col-xs-3">
					<img src="<?php echo $univ_logo; ?>" class="img-responsive" alt="Image">
				</div>
				<?php 
			}
			?>
			<div class="col-xs-<?php echo $col; ?> text-center">
				<h4>DATA ANGGOTA UKM <?php echo strtoupper($output['ukm'][$output['member']['ukm_index']]['name']); ?></h4>
				<h4>PERIODE <?php echo $output['member']['periode']; ?> / <?php echo $output['member']['periode']+1; ?></h4>
				<h4><?php echo get_config('univ_name'); ?></h4>
				<h5><?php echo get_config('univ_address'); ?></h5>
			</div>
		</div>
		<div class="col-xs-12" style="padding: 0;">
			<hr>
		</div>
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>NIM</th>
					<th>Foto</th>
					<th>Nama</th>
					<th>Jabatan</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td><?php echo $output['member']['leader']['params']['nim']; ?></td>
					<td>
						<?php 
						if($output['member']['leader']['image']) 
						{
							?>
							<img src="<?php echo $output['member']['leader']['image']; ?>" class="img-responsive" alt="Image" style="height: 20px;">
							<?php 
						}
						?>
					</td>
					<td><?php echo $output['member']['leader']['name']; ?></td>
					<td>Ketua</td>
				</tr>
				<?php 
				foreach ($output['member']['list'] as $key => $value) 
				{
					?>
					<tr>
						<td><?php echo $key+2; ?></td>
						<td><?php echo $value['nim']; ?></td>
						<td>
							<?php 
							if($value['image']) 
							{
								?>
								<img src="<?php echo $value['image']; ?>" class="img-responsive" alt="Image" style="height: 20px;">
								<?php 
							}
							?>
						</td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['position']; ?></td>
					</tr>
					<?php 
				}
				?>
			</tbody>
		</table>
	</div>
	<?php 
}
?>
<?php 
foreach ($output['ukm'] as $key => $value) 
{
	?>
	<div class="modal fade" id="anggota-<?php echo $key; ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<form action="" method="POST" class="form-inline" role="form">
						<div class="form-group">
							<label>Print Anggota UKM <?php echo $value['name']; ?> Periode</label>
						</div>
						<div class="form-group">
							<select name="periode" class="form-control" required="required">
								<?php 
								foreach ($value['member'] as $key1 => $value1) 
								{
									?>
									<option value="<?php echo $value1['id']; ?>"><?php echo $value1['periode']; ?> / <?php echo $value1['periode']+1; ?></option>
									<?php 
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-primary" name="ukm_id" value="<?php echo $value['id']; ?>"><i class="fa fa-print"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php 
}
?>