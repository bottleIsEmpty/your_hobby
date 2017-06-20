<link rel="stylesheet" href="./css/add_director.css">
<div id="background">
	<div id="add-director-form">
		<a onclick="closeWindow()"><i class="fa fa-times" aria-hidden="true"></i></a>
		<div id="title">Добавить режиссёра</div>
		<div id="add-director-block">
			<div id="block-photo">
				<img src="./images/nophoto.jpg" width="200px" id="photo">
				<sub id="delete-photo"><a href="#" onclick="removePhoto()">Удалить фото</a></sub>
			</div>
			<form action="" id="add-director">
				<ul>
					<li><b>Имя: </b><input type="text" id="dir-name"></li>
					<li><b>Фамилия: </b><input type="text" id="dir-surname"></li>
					<li><b>Фото: </b><input type="file" id="dir-photo"></li>
				</ul>
				<p id="error"></p>
			</form>
		</div>
		<button id="dir-button" form="add-director" type="submit">Добавить</button>
	</div>
</div>