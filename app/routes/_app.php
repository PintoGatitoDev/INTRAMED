<?php

//Index
app()->get('/', 'IndexController@index');

//Autenticación
app()->group("/auth", function () {
	//login
	app()->get("/login", "AutenticacionController@login_view");
	app()->post('/login', 'AutenticacionController@login');
	app()->get('/logout', 'AutenticacionController@logout');
});

//Citas
app()->group("/citas", function () {
	app()->get("/reservar", "CitaController@reservar_view");
	app()->get("/porDia", "CitaController@CitasPorDia");
});