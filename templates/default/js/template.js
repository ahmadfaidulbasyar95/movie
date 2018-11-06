$(document).ready(function() {
	$('#table').DataTable();
	$('#table1').DataTable();
	$('#table2').DataTable();
	if ($('#print_member').length >= 1) 
	{
		var delay = $('#print_member').attr('delay');
		delay = parseInt(delay);
		setTimeout(function() {
			printJS({printable: 'print_member', type: 'html', targetStyles : ['*']});
			setTimeout(function() {
				$('#print_member').remove();	
			}, 3000);
		}, delay);
	}
	$('body').on('click', '.toogle_set_active', function(event) 
	{
		var checked = ($(this).prop('checked')) ? '1' : '0';
		$.ajax({
			url: $(this).attr('data_url')+checked,
			type: 'GET',
			dataType: 'json',
			data: {},
		})
		.done(function(out) {
			if (out.ok == false) 
			{
				alert('Failed Update Active');
			}
		});		
	});
	$('body').on('click', '.modal_frame_trigger', function(event) 
	{
		$('.modal_frame').attr('src', $(this).attr('data_link'));
	});
});