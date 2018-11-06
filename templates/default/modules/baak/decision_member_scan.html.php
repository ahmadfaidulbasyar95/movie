<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<br>
<br>
<?php echo msg($msg); ?>
<form action="" method="POST" role="form">
	<div class="form-group">
		<label>Scan Code</label>
		<input type="text" name="member" class="form-control" value="" required="required" >
	</div>
	<button type="submit" class="btn btn-info" name="ok_member" value="1">Submit Code</button>
</form>