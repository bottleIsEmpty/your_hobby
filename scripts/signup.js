
$('#register_form').submit (function(event) {


	//--Считывание данных формы--//

	var login = $("#login").val();
	var password = $("#password").val();
	var password2 = $("#password2").val();
	var name = $("#name").val();
	var surname = $("#surname").val();
	var email = $("#email").val();

	//--Проверка данных--//

	var errors = [];
	
	if (login === '')
		errors.push("Введите логин");

	else if (!login.match(/^[a-z0-9_-]{3,16}$/i))
		errors.push("Некорректный логин");

	else if (password === '')
		errors.push("Введите пароль");

	else if (password.length < 5)
		errors.push("Пароль ненадёжный");

	else if (name.lenth < 3 || !name.match(/^[0-9a-zа-я]/i))
		errors.push("Имя некорректно");

	else if (surname.lenth < 2 || !surname.match(/^[0-9a-zа-я]/i))
		errors.push("Фамилия некорректна");

	else if (password !== password2)
		errors.push("Пароли не совпадают");

	else if (email === '')
		errors.push("Введите e-mail");

	else if (!email.match(/^[0-9a-z-\.]+\@[0-9a-z-]{2,}\.[a-z]{2,}$/i))
		errors.push("Некорректный e-mail");

	
	if (errors.length > 0)
	{
		$('#error').html(errors[0]);
		$('#error').show();
		return false;
	}
	else
	{				
		data = $(this).serialize();
		$.ajax ({
			type: 'POST',
			url: 'php/do_signup.php',
			data: data,
			success: function(html) {
				$("#error").html(html).show();

				html = JSON.parse(html);
				if (html.status === true)
				{
					$('#error').css('color', 'green');
					$('#submit_btn').prop('disabled', true).css('background-color', '#555');
					$('#error').show();
					$('#error').html('Зарегистрирован! переход на главную через <span id="timer">5</span> секунд');
					startTimer();
				}
				else
				{
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
	var i = 4;
	var timerId = setInterval(function() {
		$("#timer").html(i);
		if (i == 1) 
			clearInterval(timerId);
		i--
	}, 1000);
	setTimeout(function() {
		document.location.replace('index.php');
	}, 5000);
}