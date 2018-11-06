<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Profill UKM <?php echo $output['ukm']['name']; ?></h3>
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
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Periode</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover" id="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Periode</th>
						<th class="text-center">Leader</th>
						<th class="text-center">Pembina</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($output['periode'] as $key => $value) 
					{
						?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value['periode'].' / '.($value['periode']+1); ?></td>
							<td class="text-center">
								<?php 
								if($value['user_leader']['image']) 
								{
									?>
									<img src="<?php echo $value['user_leader']['image']; ?>" class="img-responsive" alt="Image" style="height: 40px; display: inline-block;">
									<?php 
								}
								?>
								<p>
									<?php echo $value['user_leader']['name'].' <br> '.$value['user_leader']['email']; ?>
								</p>
							</td>
							<td class="text-center">
								<?php 
								if($value['user_pembina']['image']) 
								{
									?>
									<img src="<?php echo $value['user_pembina']['image']; ?>" class="img-responsive" alt="Image" style="height: 40px; display: inline-block;">
									<?php 
								}
								?>
								<p>
									<?php echo $value['user_pembina']['name'].' <br> '.$value['user_pembina']['email']; ?>
								</p>
							</td>
							<td>
								<a href="<?php echo $value['url']; ?>">
									<i class="fa fa-users"></i>
								</a>
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