<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<div class="col-xs-12 col-sm-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo (@$output['edit']['id']) ? 'Edit' : 'Add'; ?> Proposal</h3>
		</div>
		<div class="panel-body">
			<?php 
			echo msg($msg);
			?>
			<form action="" method="POST" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Nama kegitan</label>
					<input type="text" class="form-control" placeholder="Nama kegitan" name="name" required="required" value="<?php echo @$output['edit']['name']; ?>">
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>
</div>
<div class="col-xs-12 col-sm-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Proposal</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover" id="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Date</th>
							<th></th>
							<th></th>
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
									<a href="<?php echo $sys->mod['url'].'proposal_detail/'.$value['id']; ?>" class="text-success"><i class="fa fa-book"></i></a>
								</td>
								<td>
									<a href="<?php echo $sys->mod['url_task'].'edit/'.$value['id']; ?>" class="text-info"><i class="fa fa-pencil"></i></a>
								</td>
								<td>
									<a href="<?php echo $sys->mod['url_task'].'delete/'.$value['id']; ?>" class="text-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
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