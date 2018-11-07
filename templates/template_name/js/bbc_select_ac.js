$(document).ready(function() {
	
	window.bbc_select_ac = function(element,index) 
	{
		element.hide();
		element.addClass('ac_'+index);
		var max_item = $(this).data('max_item');
		if(!max_item) max_item = 10;
		
		$('<input type="text" class="form-control bbc_select_ac_filter ac_'+index+'" data-max_item="'+max_item+'" data-index="'+index+'" placeholder="'+element.attr('placeholder')+'"> <div class="bbc_select_ac_results ac_'+index+'" data-index="'+index+'" style="position: absolute; display: none;"> <div class="list-group"> </div> </div>').insertAfter(element);
	}

	$('body').on('keyup', '.bbc_select_ac_filter', function(event) {
		var element = $(this);
		var value   = element.val();
		setTimeout(function() {
			if (element.val()==value) 
			{
				var max_item = element.data('max_item');
				var index    = element.data('index');
				var found    = 0;

				$('.bbc_select_ac_results.ac_'+index+' .list-group').html('');
				
				$('.bbc_select_ac.ac_'+index+' option').filter(function(idx) {
					var r = false;
					if (found < max_item) 
					{
						r = ($(this).html().toLowerCase().search(value.toLowerCase()) != -1) ? true : false;
						if (r) 
						{
							found += 1;
						}
					}
					return r;
				}).each(function(idx, el) {
					var active = (idx==0) ? 'active' : '';
					$('.bbc_select_ac_results.ac_'+index+' .list-group').append('<a href="#" class="list-group-item '+active+'" value="'+$(this).attr('value')+'">'+$(this).html()+'</a>');
				});
			}
		}, 200);
	});

	$('body').on('click', '.bbc_select_ac_results a', function(event) {
		event.preventDefault();
		var index = $(this).parents('.bbc_select_ac_results').data('index');
		$('.bbc_select_ac.ac_'+index).val($(this).attr('value'));
		$('.bbc_select_ac_filter.ac_'+index).val($(this).html());
	});

	$('body').on('focusin', '.bbc_select_ac_filter', function(event) {
		var index = $(this).data('index');
		$('.bbc_select_ac_results.ac_'+index).show();
	});

	$('body').on('focusout', '.bbc_select_ac_filter', function(event) {
		var index = $(this).data('index');
		setTimeout(function() {
			$('.bbc_select_ac_results.ac_'+index).hide();
		}, 200);
	});

	$('.bbc_select_ac').each(function(index, el) {
		window.bbc_select_ac($(this),index);
	});

});
