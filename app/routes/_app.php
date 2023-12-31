<?php

use \App\Controllers\IndexController;
use \App\Controllers\AutenticacionController;
use \App\Controllers\CitaController;


app()->get('/', 'IndexController@index');
app()->get('/home', 'IndexController@index');

//Autenticación
app()->get('/login', 'AutenticacionController@login_view');
app()->get('/logout', 'AutenticacionController@logout');
app()->post('/VerifyLogin', 'AutenticacionController@login');
app()->get('/register', 'AutenticacionController@register_view');
app()->post('/registerData', 'AutenticacionController@RegisterData');
app()->get('/registerAdmin', 'AutenticacionController@register_Admin_View');
app()->get('/registerMedic', 'AutenticacionController@register_Medic_View');
app()->get('/registerPatient', 'AutenticacionController@register_Patient_View');
app()->post('/registerAdminBD', 'AutenticacionController@registerAdminBD');
app()->post('/registerMedicBD', 'AutenticacionController@registerMedicBD');
app()->post('/registerPatientBD', 'AutenticacionController@registerPatientBD');


//Usuarios - Info Pago
app()->group('/User', function () {

    //usuarios
    app()->get('/profile', 'UserController@profile');
    app()->post('/{id}/EditInfPersonal', 'UserController@editInfPersonal');

    //Contacto
    app()->post('/{id}/EditInfContacto', 'UserController@editContacto');

    //Pagos
    app()->get('/{id}/DelInfPago', 'UserController@DelInfPago');
    app()->get('/{id}/FormInfPago', 'UserController@newInfPago_view');
    app()->post('/{id}/addInfPago', 'UserController@addInfPago');
    
    //Información Medica
    app()->get('/DelInfMedic/{id_inf}', 'UserController@DelInfMedic');
    app()->get('/{id}/FormInfMedic', 'UserController@newInfMedic_view');
    app()->post('/{id}/addInfMedic', 'UserController@addInfMedic');
    app()->get('/InfMedic/{id_inf}', 'UserController@infMedicView');

});

//Citas Medicas
app()->group("/Citas",function(){
    app()->get("/prueba", "CitaController@prueba");
    app()->get("/nueva", "CitaController@reservar_view");
    app()->get("/reservar", "CitaController@reservar");
    app()->get("/MisCitas","CitaController@MisCitas");
    app()->get("/CPacientes", "CitaController@CitasPacientes");
    app()->get("/Informe", "CitaController@InformeCitas");
    app()->get("/Finalizar" , "CitaController@Finalizar");
    app()->get("/{id_cita}","CitaController@Cita_View");

    
});