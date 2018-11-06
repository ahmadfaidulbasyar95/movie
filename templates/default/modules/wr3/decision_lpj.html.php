<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');
?>
<?php echo msg($msg); ?>
<form action="" method="POST" role="form">
	<div class="form-group">
		<label for="">APBU Approved</label>
		<input type="number" name="cost" class="form-control" value="<?php echo $output['verify_wr3_cost']; ?>" required="required">
	</div>
	<div class="form-group">
		<label for="">Comment</label>
		<textarea name="comment" class="form-control" rows="3"><?php echo $output['verify_wr3_comment']; ?></textarea>
	</div>
	<button type="submit" class="btn btn-info" name="ok" value="1">Approve</button>
	<button type="submit" class="btn btn-danger" name="ok" value="2">Decline</button>
</form>