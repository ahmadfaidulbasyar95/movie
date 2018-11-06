<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
if (1) 
{
	include $sys->tpl('decision_member_scan');
}else
{
	?>
	<br>
	<br>
	<?php echo msg($msg); ?>
	<form action="" method="POST" role="form">
		<div class="form-group">
			<label>Member of UKM Who Receive money</label>
			<select name="member" class="form-control" required="required">
				<?php 
				foreach ($output['member_list'] as $key => $value) 
				{
					?>
					<option value="<?php echo $value['id']; ?>" <?php echo ($output['verify_ukm_member_id']==$value['id']) ? 'selected="selected"' : '' ;?> ><?php echo $value['nim']; ?> - <?php echo $value['name']; ?></option>
					<?php 
				}
				?>
			</select>
		</div>
		<button type="submit" class="btn btn-info" name="ok_member" value="1">Received</button>
	</form>
	<?php 
}
?>