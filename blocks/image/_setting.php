<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<div class="form-group">
	File Picker
</div>
<div class="form-group">
	<label>URL <small class="text-muted">[default Home Page]</small></label>
	<input type="text" name="config[url]" class="form-control" value="<?php echo @$block['config']['url']; ?>">
</div>
<div class="form-group">
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="config[is_url]" <?php if(@$block['config']['is_url']) echo 'checked="checked"'; ?> >
			Is Image Link
		</label>
	</div>
</div>