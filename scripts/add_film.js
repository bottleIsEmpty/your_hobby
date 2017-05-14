var photo;

var closeWindow = function() {
    $("#add-director-form").fadeOut();
};

var openWindow = function() {
    $("#add-director-form").fadeIn();
}

var addGenre = function() {
    var exp = new RegExp($("#add-genre-field").val());
    if (!($("#genre").val().match(exp))) {
        $("#genre").val($("#genre").val() + $("#add-genre-field").val() + ", ");
    }
}

var removeGenre = function() {
    $("#genre").val($("#genre").val().replace($("#add-genre-field").val() + ", ", ""));
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

$("#add-director").submit(function (event) {

	event.preventDefault();
	
	if (!checkDirName() || !checkDirSurname()) {
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
})

var checkDirName = function() {
	var name = $("#dir-name").val();
	
	if (!name.match(/^[0-9а-я-]/i) || name.length < 2) {
		$("#dir-name").css("border", "1px solid red");
		return false;
	} else {
		$("#dir-name").css("border", "");
		return true;
	}
}

var checkDirSurname = function() {
	var surname = $("#dir-surname").val();
	
	if (!surname.match(/^[0-9а-я-]/i) || surname.length < 2) {
		$("#dir-surname").css("border", "1px solid red");
		return false;
	} else {
		$("#dir-surname").css("border", "");
		return true;
	}
}