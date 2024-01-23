<?php

//Index
app()->get('/', 'IndexController@index');

//Autenticación
app()->group("/auth", function () {
	//login
	app()->get("/login", "AutenticacionController@login_view");
	app()->post('/login', 'AutenticacionController@login');
	app()->get('/logout', 'AutenticacionController@logout');
	app()->get('/register', 'AutenticacionController@register_view');
	app()->post('/registerData', 'AutenticacionController@RegisterData');
	app()->get('/registerMedic', 'AutenticacionController@register_Medic_View');
	app()->post('/registerMedicBD', 'AutenticacionController@registerMedicBD');
	app()->get('/registerAdmin', 'AutenticacionController@register_Admin_View');
	app()->post('/registerAdminBD', 'AutenticacionController@registerAdminBD');

	app()->get('/registerPatient', 'AutenticacionController@register_Patient_View');
	app()->post('/registerPatientBD', 'AutenticacionController@registerPatientBD');
});

//Citas
app()->group("/citas", function () {
	app()->get("/misCitas", "CitaController@MisCitas");
	app()->get("/reservar", "CitaController@reservar_view");
	app()->get("/porDia", "CitaController@CitasPorDia");
	app()->post("/reservar", "CitaController@reservar");
	app()->post("/agendarNueva", "CitaController@agendarNueva");
	app()->get("/cPacientes", "CitaController@CitasPacientes");
	app()->get("/finalizar", "CitaController@Finalizar");
	app()->get("/informe", "CitaController@InformeCitas");
	app()->get("/{id_cita}/agendarNueva/{id_paciente}", "CitaController@agendarNueva_view");
	app()->get("/{id_cita}", "CitaController@Cita_View");
});