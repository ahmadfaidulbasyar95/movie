<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<div class="row" id="print_member" delay="0" style="width: 1200px !important;">
	<div class="col-xs-12" style="border-bottom: 1px solid black; padding-bottom: 10px; margin-bottom: 10px;">
		<?php 
		$logo_univ = get_config('logo');
		if($logo_univ) 
		{
			?>
			<div class="col-xs-3 text-center">
				<img src="<?php echo admin_img($logo_univ); ?>" class="img-responsive" alt="Image">
			</div>
			<?php 
		}
		$col = ($x_output['ukm']['image']) ? 6 : 9 ;
		?>
		<div class="col-xs-<?php echo $col; ?> text-center">
			<h3><?php echo get_config('univ_name'); ?></h3>
			<h3>UKM <?php echo $x_output['ukm']['name']; ?></h3>
			<h4>PERIODE <?php echo $x_output['ukm']['periode_current']; ?> / <?php echo $x_output['ukm']['periode_current']+1; ?></h4>
			<h5>
				alamat : <?php echo $x_output['ukm']['params']['address']; ?>
				telepon : <?php echo $x_output['ukm']['params']['phone']; ?>
			</h5>
		</div>
		<?php 
		if($x_output['ukm']['image']) 
		{
			?>
			<div class="col-xs-3 text-center">
				<img src="<?php echo $x_output['ukm']['image']; ?>" class="img-responsive" alt="Image">
			</div>
			<?php 
		}
		?>
	</div>
	<div class="col-xs-12">
		<div class="col-xs-12">
			<h5>Judul :</h5>
			<p class="text-justify"><?php echo $x_output['proposal']['name']; ?></p>
			<h5>Latar Belakang Masalah :</h5>
			<p class="text-justify"><?php echo $x_output['proposal_detail']['params']['latar_belakang_masalah']; ?></p>
			<h5>Tujuan :</h5>
			<p class="text-justify"><?php echo $x_output['proposal_detail']['params']['tujuan']; ?></p>
			<h5>Tempat :</h5>
			<p class="text-justify"><?php echo $x_output['proposal_detail']['params']['tempat']; ?></p>
			<h5>Waktu :</h5>
			<p class="text-justify"><?php echo date_format(date_create($x_output['proposal_detail']['params']['waktu']),' d M Y'); ?></p>
			<h5>APBU disetujui :</h5>
			<p class="text-justify"><?php echo number_format($x_output['proposal_detail']['verify_wr3_cost']); ?></p>
			<h5>APBU disetujui pada :</h5>
			<p class="text-justify"><?php echo date_format(date_create($x_output['proposal_detail']['verify_wr3_date']),' d M Y H:i:s'); ?></p>
		</div>
	</div>
	<div class="col-xs-12">
		<div class="col-xs-12">
			<p class="text-right">Kudus, <?php echo date('d M Y'); ?></p>
		</div>
	</div>
	<div class="col-xs-12 text-center">
		<table class="table">
			<tbody>
				<tr>
					<td class="no_border">Wakil Rektor 3</td>
					<td class="no_border">Pembina</td>
					<td class="no_border">Anggota</td>
				</tr>
				<tr>
					<td class="no_border" style="width: 33%;">
						<?php 
						if(@$x_output['wr3']['params']['ttd']) 
						{
							?>
							<img src="<?php echo $x_output['wr3']['params']['ttd']; ?>" class="img-responsive center" alt="Image" style="width: 150px;">
							<?php 
						}
						?>
					</td>
					<td class="no_border" style="width: 33%;">
						<?php 
						if(@$x_output['pembina']['params']['ttd']) 
						{
							?>
							<img src="<?php echo $x_output['pembina']['params']['ttd']; ?>" class="img-responsive center" alt="Image" style="width: 150px;">
							<?php 
						}
						?>
					</td>
					<td class="no_border" style="width: 33%;"></td>
				</tr>
				<tr>
					<td class="no_border no_padding">
						<p style="padding-bottom: 5px; border-bottom: 1px solid; margin: 0 0 -1px 0; display: inline-block;">
							<?php echo $x_output['wr3']['name']; ?>
						</p>
						<br>
						<p style="padding-top: 5px; border-top: 1px solid; margin: 0; display: inline-block;">	
							NIP <?php echo $x_output['wr3']['params']['nip']; ?>
						</p>
					</td>
					<td class="no_border no_padding">
						<p style="padding-bottom: 5px; border-bottom: 1px solid; margin: 0 0 -1px 0; display: inline-block;">
							<?php echo $x_output['pembina']['name']; ?>
						</p>
						<br>
						<p style="padding-top: 5px; border-top: 1px solid; margin: 0; display: inline-block;">	
							NIP <?php echo $x_output['pembina']['params']['nip']; ?>
						</p>
					</td>
					<td class="no_border no_padding">
						<p style="padding-bottom: 5px; border-bottom: 1px solid; margin: 0 0 -1px 0; display: inline-block;">
							<?php echo @$x_output['member']['name']; ?>
						</p>
						<br>
						<p style="padding-top: 5px; border-top: 1px solid; margin: 0; display: inline-block;">	
							NIM <?php echo @$x_output['member']['nim']; ?>
						</p>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-xs-12">
		<div class="col-xs-12">
			<p>Scan Untuk Mengambil Uang</p>
		</div>
		<div class="col-xs-3">
			<img src="<?php echo $x_output['qrcode']; ?>" class="img-responsive" alt="Image">
		</div>
		<div class="col-xs-12">
			<p><?php echo $x_output['qrcode_text']; ?></p>			
		</div>
	</div>
</div>