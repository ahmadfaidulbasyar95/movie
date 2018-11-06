<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
$sys->meta_title = 'UKM';
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Data UKM</h3>
	</div>
	<div class="panel-body">
		<a href="<?php echo $sys->mod['url_task'].'register/'; ?>" class="btn btn-success"><i class="fa fa-plus"></i> Register UKM</a>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover" id="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
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
								<a href="<?php echo $value['link']; ?>"><?php echo $value['name']; ?></a>
							</td>
							<td>
								<div class="checkbox no_margin">
									<label>
										<input type="checkbox" class="toogle_set_active" data_url="<?php echo $sys->mod['url'].'ukm/set_active/'.$value['id'].'/'; ?>" value="1" <?php if($value['active']) echo 'checked="checked"'; ?> >
										Active
									</label>
								</div>
							</td>
							<td>
								<a href="<?php echo $value['link'].'/delete'; ?>" onclick="return(confirm('Are you sure ?'))" class="text-danger"><i class="fa fa-trash"></i></a>
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
