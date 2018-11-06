<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<?php echo msg($msg); ?>
<form action="" method="POST" role="form">
	<div class="form-group">
		<label>Proposal Information</label>
	</div>
	<button type="submit" class="btn btn-info" name="ok" value="1">Received</button>
	<button type="submit" class="btn btn-danger" name="ok" value="2">Restricted</button>
</form>