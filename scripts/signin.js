$('#signup_form').submit (function(event) {

	//--Считывание данных формы--//

	var login = $("#login").val();
	var password = $("#password").val();

	//--Проверка данных--//

	var errors = [];
	
	if (login === '')
		errors.push("Введите логин");

	else if (!login.match(/^[a-z0-9_-]{3,16}$/))
		errors.push("Некорректный логин");

	else if (password === '')
		errors.push("Введите пароль");

	//--Отправка данных на сервер--//

	if (errors.length > 0) {
		$('#error').html(errors[0]);
		$('#error').show();
		return false;
	} else {
		data = $(this).serialize();
		$.ajax ({
			type: 'POST',
			url: 'php/do_signin.php',
			cache: false,
			data: data,
			success: function(html) {
				html = JSON.parse(html);
				if (html.status === true) {
					$('#error').css('color', 'green');
					$('#submit_btn').prop('disabled', true).css('background-color', '#555');
					$('#error').show();
					$('#error').html('Вход успешен! переход на главную через <span id="timer">3</span> секунды');
					startTimer();
				} else {
					$('#error').css('color', 'red');
					$('#error').html(html.error);	
				}
				$('#error').show();
			}
		});
		return false;
	}
});

//--Функция таймера--//

var startTimer = function() {
	var i = 2;
	var timerId = setInterval(function() {
		$("#timer").html(i);
		if (i == 1) 
			clearInterval(timerId);
		i--
	}, 1000);
	setTimeout(function() {
		document.location.replace('index.php');
	}, 3000);
}