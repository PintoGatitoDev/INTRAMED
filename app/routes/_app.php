<?php

//Index
app()->get('/', 'IndexController@index');

//Autenticación
app()->group("/Auth", function () {
	//login
	app()->get("/login", "AutenticacionController@login_view");
	app()->post('/login', 'AutenticacionController@login');
	app()->get('/logout', 'AutenticacionController@logout');
});