(function() {
  window.addEventListener('load', function() {

  	$('body').append(''+
			'<div class="modal fade" id="modal-blocks_editor_position">'+
				'<div class="modal-dialog">'+
					'<div class="modal-content">'+
						'<div class="modal-header">'+
							'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
							'<h4 class="modal-title">Modal title</h4>'+
						'</div>'+
						'<div class="modal-body">'+
							'<div role="tabpanel">'+
								'<ul class="nav nav-tabs" role="tablist">'+
									'<li role="presentation" class="active">'+
										'<a href="#tab_blocks_editor_position_add" aria-controls="tab_blocks_editor_position_add" role="tab" data-toggle="tab">Add Block</a>'+
									'</li>'+
									'<li role="presentation">'+
										'<a href="#tab_blocks_editor_position_sort" aria-controls="tab_blocks_editor_position_sort" role="tab" data-toggle="tab">Sorting</a>'+
									'</li>'+
								'</ul>'+
								'<div class="tab-content">'+
									'<div role="tabpanel" class="tab-pane active" id="tab_blocks_editor_position_add">...</div>'+
									'<div role="tabpanel" class="tab-pane" id="tab_blocks_editor_position_sort">'+
										'<form action="" method="POST" role="form">'+
											'<div>'+
												'<div class="table-responsive">'+
													'<table class="table table-hover">'+
														'<tbody class="components">'+
														'</tbody>'+
													'</table>'+
												'</div>'+
											'</div>'+
											'<input type="hidden" name="act" value="update_orderby">'+
											'<button type="submit" class="btn btn-primary">Submit</button>'+
										'</form>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>'+
			'</div>'+
			'');

  	$('body').on('click', '.blocks_editor_position > .blocks_editor_action', function(event) {
  		$('#modal-blocks_editor_position').modal('show');

  		var components = [];
  		var element = {
  		  			'position' : $(this).parent('.blocks_editor_position').data('position'),
  		  			'title' : $(this).html()
  			  		};
  		$(this).siblings('.blocks_editor_component_position,.blocks_editor_component').each(function(index, el) {
  			components.push({
  			  				'id':      $(this).data('id'),
  			  				'orderby': $(this).data('orderby'),
  			  				'title':   $(this).children('.blocks_editor_action').html()
  			  				});
  		});

  		$('#modal-blocks_editor_position .modal-title').html(element.title);
  		$('#tab_blocks_editor_position_sort form').data('position', element.position);

  		var components_form = '';
  		$.each(components, function(index, val) {
  			components_form += '<tr>'+
															'<td>'+val.title+'</td>'+
															'<td><input min="1" type="number" name="'+val.id+'" class="form-control" value="'+val.orderby+'" required="required" ></td>'+
														'</tr>';
  		});
			components_form += '<tr><td> </td><td> </td></tr>';

  		$('#tab_blocks_editor_position_sort .components').html(components_form);
  	});

  	$('body').on('submit', '#tab_blocks_editor_position_sort form', function(event) {
  		event.preventDefault();
  		var el = $(this);
  		$.ajax({
  			url: window.location.href,
  			type: 'POST',
  			dataType: 'html',
  			data: el.serialize(),
  		})
  		.done(function() {
	  		$('#modal-blocks_editor_position').modal('hide');
	  		$.each(el.serializeArray(), function(index, val) {
	  			$('.blocks_editor_component[data-id="'+val.name+'"],.blocks_editor_component_position[data-id="'+val.name+'"]').data('orderby', val.value).attr('orderby', val.value);
	  		});
	  		data = el.serializeArray().sort(function(current, next){
			    return current.value - next.value;
				});
				$.each(data, function(index, val) {
	  			$('.blocks_editor_component[data-id="'+val.name+'"],.blocks_editor_component_position[data-id="'+val.name+'"]').appendTo('.blocks_editor_position[data-position="'+el.data('position')+'"]');
				});
  		});
  		
  	});


  	$('body').append(''+
			'<div class="modal fade" id="modal-blocks_editor_component">'+
				'<div class="modal-dialog">'+
					'<div class="modal-content">'+
						'<div class="modal-header">'+
							'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
							'<h4 class="modal-title">Modal title</h4>'+
						'</div>'+
						'<div class="modal-body">'+
							'<div role="tabpanel">'+
								'<ul class="nav nav-tabs" role="tablist">'+
									'<li role="presentation" class="active">'+
										'<a href="#tab_blocks_editor_component_edit" aria-controls="tab_blocks_editor_component_edit" role="tab" data-toggle="tab">Edit Block</a>'+
									'</li>'+
									'<li role="presentation">'+
										'<a href="#tab_blocks_editor_component_position" aria-controls="tab_blocks_editor_component_position" role="tab" data-toggle="tab">Position</a>'+
									'</li>'+
								'</ul>'+
								'<div class="tab-content">'+
									'<div role="tabpanel" class="tab-pane active" id="tab_blocks_editor_component_edit">...</div>'+
									'<div role="tabpanel" class="tab-pane" id="tab_blocks_editor_component_position">'+
										'<form action="" method="POST" role="form">'+
											'<br>'+
											'<label>Position Name</label>'+
											'<div class="form-group">'+
												'<select name="position" class="form-control" required="required">'+
													'<option value=""></option>'+
												'</select>'+
											'</div>'+
											'<label>Position Index</label>'+
											'<div class="form-group">'+
												'<input type="number" name="orderby" class="form-control" required="required">'+
											'</div>'+
											'<input type="hidden" name="id" value="">'+
											'<input type="hidden" name="act" value="update_position_orderby">'+
											'<button type="submit" class="btn btn-primary">Submit</button>'+
										'</form>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>'+
			'</div>'+
			'');

  	$('body').on('click', '.blocks_editor_component > .blocks_editor_action, .blocks_editor_component_position > .blocks_editor_action', function(event) {
  		$('#modal-blocks_editor_component').modal('show');

  		var el = $(this);
  		var element = {
  		  			'position' : el.parents('.blocks_editor_position').data('position'),
  		  			'title' : el.html(),
  		  			'id' : el.parent('.blocks_editor_component,.blocks_editor_component_position').data('id'),
  		  			'orderby' : el.parent('.blocks_editor_component,.blocks_editor_component_position').data('orderby')
  			  		};

  		$('#modal-blocks_editor_component .modal-title').html(element.title);
  		$('#tab_blocks_editor_component_position [name="id"]').val(element.id);
  		$('#tab_blocks_editor_component_position [name="orderby"]').val(element.orderby);

  		var positions = [];
  		$('.blocks_editor_position').each(function(index, elem) {
  			var ok = 1;
  			if (el.parent('.blocks_editor_component_position').length >= 1) 
  			{
  				if ($(this).parents('.blocks_editor_component_position[data-id="'+element.id+'"]').length >= 1) ok = 0;
  			}
  			if (ok) 
  			{
	  			var selected = (element.position == $(this).data('position')) ? 'selected="selected"' : '';
	  			positions.push({
	  				'position': $(this).data('position'),
	  				'selected' : selected,
	  				'title': $(this).children('.blocks_editor_action').html()
		  			});
  			}
  		});

  		var positions_form = '';
  		$.each(positions, function(index, val) {
  			positions_form += '<option value="'+val.position+'" '+val.selected+' >'+val.title+'</option>';
  		});

  		$('#tab_blocks_editor_component_position select').html(positions_form);

  	});

  	$('body').on('submit', '#tab_blocks_editor_component_position form', function(event) {
  		event.preventDefault();
  		var el = $(this);
  		var component = $('.blocks_editor_component[data-id="'+el.find('[name="id"]').val()+'"],.blocks_editor_component_position[data-id="'+el.find('[name="id"]').val()+'"]');
  		$.ajax({
  			url: window.location.href,
  			type: 'POST',
  			dataType: 'html',
  			data: el.serialize(),
  		})
  		.done(function() {
	  		$('#modal-blocks_editor_component').modal('hide');
	  		component.data('orderby', el.find('[name="orderby"]').val()).attr('orderby', el.find('[name="orderby"]').val());
	  		component.appendTo($('.blocks_editor_position[data-position="'+el.find('[name="position"]').val()+'"]'));

	  		var component_list = [];
	  		$('.blocks_editor_position[data-position="'+el.find('[name="position"]').val()+'"]').children('.blocks_editor_component,.blocks_editor_component_position').each(function(index, el) {
	  			component_list.push({
	  				'id': $(this).data('id'),
	  				'orderby': $(this).data('orderby')
		  			});
	  		});
	  		component_list = component_list.sort(function(current, next){
			    return parseInt(current.orderby) - parseInt(next.orderby);
				});
				$.each(component_list, function(index, val) {
	  			$('.blocks_editor_component[data-id="'+val.id+'"],.blocks_editor_component_position[data-id="'+val.id+'"]').appendTo('.blocks_editor_position[data-position="'+el.find('[name="position"]').val()+'"]');
				});
  		});

  	});


  }, false);
})();