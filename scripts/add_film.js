var photo;

var closeWindow = function() {
    $("#add-director-form").fadeOut();
};

var openWindow = function() {
    $("#add-director-form").fadeIn();
}

var addGenre = function() {
    var exp = new RegExp($("#add-genre-field").val());
    if (!($("#film-genre").val().match(exp))) {
        $("#film-genre").val($("#film-genre").val() + $("#add-genre-field").val() + ", ");
    }
}

var removeGenre = function() {
    $("#film-genre").val($("#film-genre").val().replace($("#add-genre-field").val() + ", ", ""));
}

var removePhoto = function() {
	$("#photo").attr("src", "images/nophoto.jpg");
	$("#delete-photo").slideUp();
	$("#director-photo").prop("value", null);
}

var removeLogo = function() {
	$("#logo").attr("src", "images/noposter.jpg");
	$("#delete-logo").slideUp();
	$("#film-logo").prop("value", null);
}

$('input[type="file"]').change(function(event) {
	event.preventDefault;
	photo = this.files[0];
	
    var file = event.target.files[0];
    if (!file.type.match('image.*')) {
        alert("Некорректный файл!");
        $(this).prop("value", null);
    }
    if (file.size > 2097152) {
        alert("Файл не должен превышать 2мб");
        $(this).prop("value", null);
    }
	
    var reader = new FileReader();
    reader.onload = function(theFile) {
        return function(e) {
			if (event.currentTarget.getAttribute("id") == "film-logo") {
            	$("#logo").attr("src", e.target.result);
				$("#delete-logo").slideDown();
			} else {
				$("#photo").attr("src", e.target.result);
				$("#delete-photo").slideDown();
			}
        };
    }(file);
    reader.readAsDataURL(file);
});


$("#add-director").submit(function(event) {

	event.preventDefault();
	
	if (!checkField($("#dir-name"), 'name') || !checkField($("#dir-surname"), 'name')) {
		return false;
	}
	
	var data = new FormData();
	var name = $("#dir-name").val();
	var surname = $("#dir-surname").val();
	
	data.append("photo", photo);
	data.append("name", name);
	data.append("surname", surname);
	
	$.ajax({
		url: "php/add_director_handler.php",
		cache: false,
		type: "POST",
		processData: false,
		contentType: false,
		data: data,
		success: function(answer){
			$("#error").html(answer);
		}
	});
});

$("#director-field").autocomplete({
	source: "php/quicksearch.php?table=directors",
	minLength: 3
})

$("#quicksearch ul li").click(function(event) {
	$("#director-field").val($(this).text());
})

//Обработчик кнопки "Добавить фильм"

$("#add-film").click(function(event) {
    event.preventDefault();
    
    if (!checkField($("#film-name"), "film-name")
        || !checkField($("#film-genre"), "name") 
        || !checkField($("#film-description"))) {
        return false;
    }
    
    data = new FormData();
    data.append("")
})

//Проверка поля ввода

var checkField = function(field, type) {
	var value = field.val();
	var exp;						//выражение для проверки
	var minSize = 2, maxSize = 100;	//минимальный, максимальный размер строки
	
	switch (type) {
		case 'name':
			exp = /^[а-я-]/i;
				break;
		case 'film-name': 
			exp = /^[0-9а-яa-z-\s]/i;
				break;
        case 'description':
            exp = /^[0-9а-яa-z-\s]/i;
            minSize = 50;
                break;
	}
	
	if (value.length < minSize || value.length > maxSize || !value.match(exp)) {
		field.css("border", "1px solid red");
		return false;
	} else {
		field.css("border", "");
		return true;
	}
}