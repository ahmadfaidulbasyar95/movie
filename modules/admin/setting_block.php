<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

if (@$_GET['is_editor']) 
{
	switch (@$_POST['act']) 
	{
		case 'updates_orderby':
			unset($_POST['act']);
			foreach ($_POST as $key => $value) 
			{
				$sys->db_update(array('orderby'=>$value),'block',$key);
			}
			$sys->stop();
			break;

		case 'update_position_orderby':
			unset($_POST['act']);
			$id = $_POST['id'];
			unset($_POST['id']);
			$sys->db_update($_POST,'block',$id);
			$sys->stop();
			break;

		case 'edit_form':
			$sys->stop();
			$block             = $sys->db("SELECT * FROM `block` WHERE `id`='{$_POST['id']}'",'row');
			$block['show']     = config_decode($block['show']);
			$block['config']   = config_decode($block['config']);
			$block['tpl_list'] = array();

			foreach (scandir($sys->path['root'].'blocks/'.$block['name']) as $key => $value) 
			{
				if (strpos($value, '.html.php')) 
				{
					$block['tpl_list'][] = str_replace('.html.php', '', $value);
				}
			}
			?>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#tab_blocks_editor_component_edit').parents('.modal').find('.modal-title').append(' [<?php echo $block['name']; ?>]');
				});
			</script>
			<form action="" method="POST" role="form">
				<div class="form-group">
					<div class="col-xs-12 col-sm-8 no_padding">
						<label>Title</label>
						<input type="text" class="form-control" required="required" name="title" value="<?php echo $block['title']; ?>">
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="col-xs-6 col-sm-12">
							<div class="checkbox">
								<label>
									<input type="checkbox" value="1" name="title_show" <?php if($block['title_show']) echo 'checked="checked"' ?> >
									Show Title
								</label>
							</div>
						</div>
						<div class="col-xs-6 col-sm-12">
							<div class="checkbox">
								<label>
									<input type="checkbox" value="1" name="active" <?php if($block['active']) echo 'checked="checked"' ?> >
									Active
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 no_padding">
						<label>Template</label>
						<select name="tpl" class="form-control" required="required">
							<?php 
							foreach ($block['tpl_list'] as $key => $value) 
							{
								?>
								<option value="<?php echo $value; ?>" <?php if($value==$block['tpl']) echo 'selected="selected"' ?> ><?php echo $value; ?></option>
								<?php 
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 no_padding">
						<br>
						<div class="panel panel-default">
						  <a data-toggle="collapse" href="#edit_form_config" class="collapsed">
								<div class="panel-heading">
									<h3 class="panel-title">
										Configuration
										<i class="fa fa-chevron-down pull-right"></i>
									</h3>
								</div>
							</a>
							<div class="panel-body collapse" id="edit_form_config">
								config here
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 no_padding">
						<div class="panel panel-default">
						  <a data-toggle="collapse" href="#edit_form_show" class="collapsed">
								<div class="panel-heading">
									<h3 class="panel-title">
										Show By <small class="text-muted">Empty value will show all</small>
										<i class="fa fa-chevron-down pull-right"></i>
									</h3>
								</div>
							</a>
							<div class="panel-body collapse" id="edit_form_show">
								<label>Show By User Access</label>
								<select name="show[access]"  class="form-control" multiple>
									<?php 
									foreach ($sys->access as $key => $value) 
									{
										?>
										<option value="<?php echo $key; ?>" <?php if(in_array($key,(array)@$block['show']['access'])) echo 'selected="selected"'; ?> ><?php echo $value; ?></option>
										<?php 
									}
									?>
								</select>
								<br>
								<label>Show By User Module [mod.task,mod1.task1]</label>
								<textarea name="show[mod]" class="form-control" rows="3"><?php echo implode(',', (array)@$block['show']['mod']); ?></textarea>
							</div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<?
			break;
		
		default:
			if (@$_GET['profill_id']) 
			{
				$sys->blocks_change(@$_GET['profill_id']);
			}
			$sys->blocks_editor = 1;
			$sys->link_js('setting_block.js',1);
			$sys->link_css('setting_block.css',1);
			break;
	}
}else
{
	$sys->meta_title = 'Setting Blocks';
	echo '<iframe src="'.$sys->mod['url_task'].'?is_editor=1&profill_id='.urlencode(@$_GET['profill_id']).'" frameborder="0" width="100%" height="600px"></iframe>';
}
?>
