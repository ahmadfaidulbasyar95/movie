<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<div class="form-group">
	<label>Additional Class</label>
	<input type="text" name="config[add_class]" class="form-control" value="<?php echo @$block['config']['add_class']; ?>">
</div>
<div class="form-group">
	<label>Additional Style</label>
	<textarea name="config[add_style]" class="form-control" rows="3"><?php echo @$block['config']['add_style']; ?></textarea>
</div>