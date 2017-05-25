var photo;	//переменная для хранения фото

var closeWindow = function() {
	$("#background").fadeOut();
    $("#add-director-form").fadeOut();
};

var openWindow = function() {
	$("#background").fadeIn();
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

var checkField = function(field, type) {
	var value = field.val();
	var exp;						//regExp для проверки
	var minSize = 2, maxSize = 100;	//минимальный, максимальный размер строки
	
	switch (type) {
		case 'name':
			exp = /^[-а-я]/i;
				break;
		case 'film-name': 
			exp = /^[-0-9а-яa-z\s]/i;
		  		break;
        case 'description':
            exp = /^[^\^<>\|{}\\]/i;
            minSize = 50;
			maxSize = 3000;
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

$("#background").dblclick(function(event) {
	$("#background").fadeOut();
    $("#add-director-form").fadeOut();
})

//Обработчик добавления картинки

$('input[type="file"]').change(function(event) {
	event.preventDefault;
	photo = this.files[0];
	
    var file = event.target.files[0];
    if (!file.type.match('image.*')) {
        alert("Некорректный файл!");
        $(this).prop("value", null);
		return false;
    }
    if (file.size > 2097152) {
        alert("Файл не должен превышать 2мб");
        $(this).prop("value", null);
		return false;
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

//Обработчик кнопки "Добавить режиссёра"

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

//Быстрый поиск

$("#director-field").autocomplete({
	source: "php/quicksearch.php?table=directors",
	minLength: 3
});

//Обработчик кнопки "Добавить фильм"

$("#add-film").click(function(event) {
    event.preventDefault();
    
	var name = $("#film-name");
	var genres = $("#film-genre");
	var director = $("#director-field");
	var type = $("#film-rd").prop("checked") ? "f" : "s";
	var year = $("#year-field")
	var description = $("#film-description");
	
    if (!checkField(name, "film-name")
		|| !checkField(genres, "name")
		|| !checkField(director, "name")
        || !checkField(description, "description")) {
        return false;
    }
    
    data = new FormData();
	data.append("name", name.val());
	data.append("type", type);
	data.append("genres", genres.val());
	data.append("year", year.val());
	data.append("director", director.val());
	data.append("logo", photo);
	data.append("description", description.val());
	
	$.ajax({
		url: "php/add_film_handler.php",
		cache: false,
		type: "POST",
		processData: false,
		contentType: false,
		data: data,
		success: function(answer){
			$("#response").html(answer);
		}
	})
});

//Проверка поля ввода

