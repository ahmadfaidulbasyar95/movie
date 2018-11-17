<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

?>
<form class="navbar-form navbar-left movie_search" role="search">
	<div class="form-group">
		<select name="url" class="form-control select_autocomplete" placeholder="<?php echo $block['title']; ?>" data-callback="movie_search">
			<option value=""><?php echo $block['title']; ?></option>
			<?php 
			foreach ($output as $key => $value) 
			{
				?>
				<option value="<?php echo $value['url']; ?>"><?php echo $value['name']; ?></option>
				<?php 
			}
			?>
		</select>
	</div>
</form>
<script type="text/javascript">
	window.movie_search = function(el) 
	{
		if (el.val()) 
		{
			window.location.href = el.val();
		}
	}
</script>