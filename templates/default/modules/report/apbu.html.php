<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
// pr($output);
?>
<form action="" method="POST" class="form-inline text-center" role="form">
	<div class="form-group">
		<label>Periode</label>
	</div>
	<div class="form-group">
		<select name="periode" class="form-control" required="required">
			<?php 
			foreach ($output['periodes'] as $key => $value) 
			{
				?>
				<option value="<?php echo $value; ?>" <?php if($value==$output['periode']) echo 'selected' ; ?> ><?php echo $value; ?> / <?php echo $value+1; ?></option>
				<?php 
			}
			?>
		</select>
	</div>
	<button type="submit" class="btn btn-primary" name="print" value="0">Go</button>
	<button type="submit" class="btn btn-info" name="print" value="1"><i class="fa fa-print"></i></button>
</form>
<br>
<h5><b>Total Realisasi : Rp <?php echo number_format($output['apbu_total']); ?></b></h5>
<br>
<table class="table table-bordered table-striped table-hover" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Logo</th>
			<th>Nama UKM</th>
			<th>Realisasi</th>
			<th>Jumlah Kegiatan</th>
			<th>Rincian Kegiatan</th>
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
				<td>Rp <span class="pull-right"><?php echo number_format($value['apbu']); ?></span></td>
				<td><?php echo count($value['kegiatan']); ?></td>
				<td>
					<a class="btn btn-primary" data-toggle="modal" href='#kegiatan-<?php echo $key; ?>'><i class="fa fa-book"></i></a>
				</td>
			</tr>
			<?php 
		}
		?>
	</tbody>
</table>
<?php 
$output_report_ukm = array();
foreach ($output['ukm'] as $key => $value) 
{
	?>
	<div class="modal fade" id="kegiatan-<?php echo $key; ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">
						<form action="" method="POST" class="form-inline" role="form">
							<div class="form-group">
								<label >Kegiatan UKM <?php echo $value['name']; ?> </label>
							</div>
							<button type="submit" class="btn btn-info" name="ukm_id" value="<?php echo $value['id']; ?>"><i class="fa fa-print"></i></button>
						</form>
					</h4>
				</div>
				<div class="modal-body">
					<?php ob_start(); ?>
					<table>
						<tr>
							<td>MATA ANGGARAN</td>
							<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
							<td>Pembinaan BEM Univ dan UKM</td>
						</tr>
						<tr>
							<td>BEM / UKM</td>
							<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
							<td><b><?php echo strtoupper($value['name']); ?></b></td>
						</tr>
						<tr>
							<td>JUMLAH ANGGARAN</td>
							<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
							<td>Rp <?php echo number_format($output['apbu_max']); ?></td>
						</tr>
						<tr>
							<td><br></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>REALISASI ANGGARAN</td>
							<td></td>
						</tr>
					</table>
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>URAIAN</th>
								<th>USULAN</th>
								<th>REALISASI</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($value['kegiatan'] as $key1 => $value1) 
							{
								?>
								<tr>
									<td><?php echo $key1+1; ?></td>
									<td><?php echo date_format(date_create($value1['created']),'d M Y'); ?></td>
									<td><?php echo $value1['name']; ?></td>
									<td>Rp <span class="pull-right"><?php echo number_format($value1['apbu']); ?></span></td>
									<td>Rp <span class="pull-right"><?php echo number_format($value1['apbu_used']); ?></span></td>
								</tr>
								<?php 
							}
							?>
							<tr>
								<td></td>
								<td colspan="3"><b>Total Realisasi</b></td>
								<td><b>Rp <span class="pull-right"><?php echo number_format($value['apbu']); ?></span></b></td>
							</tr>
							<tr>
								<td></td>
								<td colspan="3"><b>Saldo Anggaran</b></td>
								<td><b>Rp <span class="pull-right"><?php echo number_format($output['apbu_max']-$value['apbu']); ?></span></b></td>
							</tr>
						</tbody>
					</table>
					<?php 
					$value_report_ukm = ob_get_clean();
					echo $value_report_ukm;
					if ($output['is_print']) $output_report_ukm[] = $value_report_ukm;
					if($value['is_print']) 
					{
						echo '<div id="print_member" >';
						echo $value_report_ukm;
						echo '</div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php 
}
if ($output['is_print']) 
{
	$output_report_ukm_delimiter = '<div style="page-break-after: always;"></div>';
	echo '<div style="display:none"><div id="print_member" >';
	echo implode($output_report_ukm_delimiter, $output_report_ukm);
	echo '</div></div>';
}
?>