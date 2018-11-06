<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'UKM '.$output['name'];
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Periode</h3>
	</div>
	<div class="panel-body">
		<a href="<?php echo $sys->mod['url_task'].'detail/'.urlencode($output['name']).'/periode'; ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Periode</a>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover" id="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Periode</th>
						<th>Leader</th>
						<th>Pembina</th>
						<th></th>
						<th></th>
						<th></th>
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
							<td>
								<a href="<?php echo $value['link']; ?>"><?php echo $value['periode']; ?> / <?php echo $value['periode']+1; ?></a>
							</td>
							<td><?php echo $value['user_leader']['name']; ?></td>
							<td><?php echo $value['user_pembina']['name']; ?></td>
							<td>
								<a href="<?php echo $value['link'].'/delete'; ?>" onclick="return(confirm('Are you sure ?'))" class="text-danger"><i class="fa fa-trash"></i></a>
							</td>
							<td>
								<a href="<?php echo $sys->path['url'].'ukm_public/periode/'.$value['id']; ?>" target="blank" class="text-info"><i class="fa fa-users"></i></a>
							</td>
							<td>
								<a href="<?php echo $sys->path['url'].'user/admin_login/'.$value['user_leader']['username']; ?>" class="text-info">Leader Login</a>
							</td>
							<td>
								<a href="<?php echo $sys->path['url'].'user/admin_user_reset_password/'.$value['user_leader_id'].'/?return='.$sys->mod['name'].'.'.$sys->mod['task'].'.'.implode('.', $sys->mod['sub_task']); ?>" class="text-warning" onclick="return(confirm('Are you sure ?'))" >Reset Password</a>
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