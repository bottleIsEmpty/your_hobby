$('.rating').starbox({
	stars: 10,
	buttons: 10,
	average: 0.5,
	changeable: 'once',
	autoUpdateAverage: true,
	ghosting: false
}).bind('starbox-value-changed', function() {
	
	var num = $('.rating').starbox('getValue') * 10;
	
	/*ajax-запрос. Результат: rating, rated_by*/
	$.post('/php/rating_handler.php', {rating: num, id: getID()}, function(response) {

		if (!response.error) {
			alert(response);
		}
		
		$('#mark-text').fadeOut(400, function() {
			$('#mark-text').html('Спасибо за оценку!').fadeIn();
		});
	});
	getID();
});

$("#year-slider").slider({
	range: true,
	min: 1930,
	max: 2017,
	animate: true,
	values: [1950, 2010],
	slide: function(event, ui) {
		$("#year-bottom").val(ui.values[0]);
		$("#year-top").val(ui.values[1]);
	}
});
$("#year-bottom").val($("#year-slider").slider("values", 0));
$("#year-top").val($("#year-slider").slider("values", 1));

$("#rating-slider").slider({
	range: true,
	min: 1,
	max: 10,
	animate: true,
	values: [5, 9],
	slide: function(event, ui) {
		$("#rating-bottom").val(ui.values[0]);
		$("#rating-top").val(ui.values[1]);
	}
});
$("#rating-bottom").val($("#rating-slider").slider("values", 0));
$("#rating-top").val($("#rating-slider").slider("values", 1));

	
/*Получение ID*/
function getID() {
	var addr = (window.location).toString();
	
	var variable = +addr.split('&')[1].split('=')[1];
	return(variable);
}
