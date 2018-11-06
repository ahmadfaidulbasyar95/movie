<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<br>
<br>
<?php echo msg($msg); ?>
<form action="" method="POST" role="form">
	<div class="form-group">
		<label>Money Ready ?</label>
	</div>
	<button type="submit" class="btn btn-info" name="ok_money" value="1">Yes</button>
	<button type="submit" class="btn btn-danger" name="ok_money" value="2">No</button>
</form>