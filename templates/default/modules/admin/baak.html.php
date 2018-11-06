<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'User BAAK';
?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Data BAAK</h3>
	</div>
	<div class="panel-body">
		<a href="<?php echo $sys->mod['url_task'].'register/'; ?>" class="btn btn-success"><i class="fa fa-plus"></i> Register BAAK</a>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover" id="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Email</th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($output as $key => $value) 
					{
						?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td>
								<a data-toggle="modal" href='#modal-id' data_link="<?php echo $value['link']; ?>" class="modal_frame_trigger"><?php echo $value['name']; ?></a>
							</td>
							<td><?php echo $value['email']; ?></td>
							<td>
								<div class="checkbox no_margin">
									<label>
										<input type="checkbox" class="toogle_set_active" data_url="<?php echo $sys->mod['url'].'baak/set_active/'.$value['id'].'/'; ?>" value="1" <?php if($value['active']) echo 'checked="checked"'; ?> >
										Active
									</label>
								</div>
							</td>
							<td>
								<a href="<?php echo $sys->mod['url'].'baak/delete/'.$value['id'].'/'; ?>" onclick="return(confirm('Are you sure ?'))" class="text-danger"><i class="fa fa-trash"></i></a>
							</td>
							<td>
								<a href="<?php echo $sys->path['url'].'user/admin_login/'.$value['username']; ?>" class="text-info">Login</a>
							</td>
							<td>
								<a href="<?php echo $sys->path['url'].'user/admin_user_reset_password/'.$value['id'].'/?return='.$sys->mod['name'].'.'.$sys->mod['task'].' '; ?>" class="text-warning" onclick="return(confirm('Are you sure ?'))" >Reset Password</a>
							</td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
		<div class="modal fade" id="modal-id">
			<div class="modal-dialog">
				<div class="modal-content" style="border-radius: 0; ">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute;right: 0;top: -20px;">&times;</button>
					<iframe src="" class="modal_frame" style="height: 80vh;width: 100%;border: 0;"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>
