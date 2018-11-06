<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<a href="<?php echo $sys->mod['url']; ?>" class="btn btn-primary"><i class="fa fa-chevron-left"></i></a> 
			Profill UKM <?php echo $output['ukm']['name']; ?>
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
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title">
			<a href="<?php echo $sys->mod['url']; ?>" class="btn btn-warning"><i class="fa fa-chevron-left"></i></a> 
			Periode <?php echo $output['periode']['periode']; ?> / <?php echo $output['periode']['periode']+1; ?>
		</h3>
	</div>
	<div class="panel-body">
		<div class="col-xs-12 col-sm-6">
			<h4 class="text-center">Leader</h4>
			<?php 
			$col = (@$output['periode']['user_leader']['image']) ? 9 : 12; 
			?>
			<?php 
			if(@$output['periode']['user_leader']['image']) 
			{
				?>
				<div class="col-xs-12 col-sm-3">
					<img src="<?php echo $output['periode']['user_leader']['image']; ?>" class="img-responsive" alt="Image">
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
								<td><?php echo $output['periode']['user_leader']['name']; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><?php echo $output['periode']['user_leader']['email']; ?></td>
							</tr>
							<tr>
								<td>NIM</td>
								<td>:</td>
								<td><?php echo @$output['periode']['user_leader']['params']['nim']; ?></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td>:</td>
								<td><?php echo @$output['periode']['user_leader']['params']['phone']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<h4 class="text-center">Pembina</h4>
			<?php 
			$col = (@$output['periode']['user_pembina']['image']) ? 9 : 12; 
			?>
			<?php 
			if(@$output['periode']['user_pembina']['image']) 
			{
				?>
				<div class="col-xs-12 col-sm-3">
					<img src="<?php echo $output['periode']['user_pembina']['image']; ?>" class="img-responsive" alt="Image">
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
								<td><?php echo $output['periode']['user_pembina']['name']; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><?php echo $output['periode']['user_pembina']['email']; ?></td>
							</tr>
							<tr>
								<td>NIP</td>
								<td>:</td>
								<td><?php echo @$output['periode']['user_pembina']['params']['nip']; ?></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td>:</td>
								<td><?php echo @$output['periode']['user_pembina']['params']['phone']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">
			<a href="<?php echo $sys->mod['url']; ?>" class="btn btn-info"><i class="fa fa-chevron-left"></i></a> 
			Struktur Organisasi
		</h3>
	</div>
	<div class="panel-body">
		<div class="tree">
			<ul>
				<li>
					<a href="#">
						<?php 
						if($output['periode']['user_leader']['image']) 
						{
							?>
							<img src="<?php echo $output['periode']['user_leader']['image']; ?>" class="img-responsive" alt="Image">
							<?php 
						}
						?>
						<div class="pull-right">
							<h5>Leader</h5>
							<h5><b><?php echo @$output['periode']['user_leader']['params']['nim']; ?></b></h5>
							<h5><?php echo $output['periode']['user_leader']['name']; ?></h5>
						</div>
					</a>
					<?php echo ukm_member_tree($output['periode']['member']); ?>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php 
function ukm_member_tree($data=array(),$par_id='0')
{
	global $sys;
	$output = '<ul>';
	foreach ($data as $key => $value) 
	{
		if ($value['par_id'] == $par_id) 
		{
			$img = ($value['image']) ? '<img src="'.$value['image'].'" class="img-responsive" alt="Image">' : '';
			$output .= '
			<li>
				<a href="#" class="text-center">
					'.$img.'
					<div class="pull-right">
						<h5>'.$value['position'].'</h5>
						<h5><b>'.$value['nim'].'</b></h5>
						<h5>'.$value['name'].'</h5>
					</div>
				</a>
				'.ukm_member_tree($data,$value['id']).'
			</li>
			';
		}
	}
	$output .= '</ul>';
	return $output;
}
 ?>