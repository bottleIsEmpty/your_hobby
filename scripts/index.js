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