<?php

/* Este es el archivo de enrutamiento de la aplicación web, aqui se define las rutas y las funciones a las que tiene que ir */

//Index
app()->get("/","IndexController@index");

//Autenticación
app()->group("/auth", function () {
	//login
	app()->get("/login", "AuthController@login_view");
	app()->post('/login', 'AuthController@login');
	app()->get('/logout', 'AuthController@logout');
	app()->get('/register', 'AuthController@register_view');
	app()->post('/registerData', 'AuthController@RegisterData');

	app()->get('/registerMedic', 'AuthController@register_Medic_View');
	app()->post('/registerMedic', 'AuthController@registerMedic');
	app()->get('/registerAdmin', 'AuthController@register_Admin_View');
	app()->post('/registerAdmin', 'AuthController@registerAdmin');
	app()->get('/registerPatient', 'AuthController@register_Patient_View');
	app()->post('/registerPatient', 'AuthController@registerPatient');
	app()->get('/codeSecurity', 'AuthController@codeSecurity_view');
	app()->get('/codeLogin',"AuthController@codeLogin_view");
	app()->post("/loginAdmin","AuthController@loginAdmin");
});

app()->group("/user", function() {
	app()->get("/profile","UserController@profile");
	app()->get("/{id}/NewInfPago","UserController@newInfPago_View");
	app()->post("/{id}/addInfPago","UserController@addInfPago");
});

//Citas
app()->group("/citas", function () {
	app()->get("/misCitas", "CitaController@MisCitas");
	app()->get("/reservar", "CitaController@reservar_view");
	app()->get("/porDia", "CitaController@CitasPorDia");
	app()->post("/reservar", "CitaController@reservar");
	app()->post("/agendarNueva", "CitaController@agendarNueva");
	app()->get("/cPacientes", "CitaController@CitasPacientes");
	app()->get("/{id_cita}/finalizar", "PagoController@formPago_view");
	app()->get("/informe", "CitaController@InformeCitas");
	app()->get("/{id_cita}/agendarNueva/{id_paciente}", "CitaController@agendarNueva_view");
	app()->get("/{id_cita}", "CitaController@Cita_View");
});

app()->group("/pagos",function ()
{
	app()->post("/guardarFormato","PagoController@guardarFormato");
	app()->get("/pagosRealizadosPacientes","PagoController@pagosRealizadosAdmin_view");
	app()->get("/pagoRealizado/{id_pago}","PagoController@pago_view");
	app()->get("/deudasPacientes","PagoController@deudasPacientesAdmin_view");
	app()->get("/pacienteDeudas","PagoController@pagosDPaciente_view");
	app()->get("/pacienteRealizados","PagoController@pagosRPaciente_view");
	app()->get("/pagar/{id_pago}/paciente/{id_paciente}","PagoController@seleccionarMetodo_view");
});