var App = {};

$(document).ready(function() {
	App.initDelete('itemContent');
	App.initToggle('itemlist');
});

App.initToggle = function(id) {
	$('#'+id).find('a[class="toggle"]').click(function() {
		var id = $(this).attr('id');
		var tar = id.replace('toggle','target');
		$('#'+tar).toggle();
		return false;
	});	
};

App.initDelete = function(id) {
	$('#'+id).find("a[class='delete']").click(function() {
		if (confirm('are you sure?')) {
			var del_o = {
				'url': $(this).attr('href'),
				'type':'DELETE',
				'success': function(data) {
					alert(data);
					location.reload();
				},
				'error': function() {
					alert('sorry, cannot delete');
				}
			};
			$.ajax(del_o);
		}
		return false;
	});
};
