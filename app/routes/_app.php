<?php

use \App\Controllers\IndexController;
use \App\Controllers\AutenticacionController;


app()->get('/', 'IndexController@index');

//Autenticacion
app()->get('/login','AutenticacionController@login_view');
app()->post('/VerifiedLogin','AutenticacionController@login');
app()->get('/register','AutenticacionController@register_view');
app()->post('/registerData','AutenticacionController@RegisterData');
app()->get('/registerAdmin','AutenticacionController@register_Admin_View');
app()->get('/registerMedic','AutenticacionController@register_Medic_View');
app()->get('/registerPatient','AutenticacionController@register_Patient_View');
app()->post('/registerAdminBD','AutenticacionController@registerAdminBD');
app()->post('/registerMedicBD','AutenticacionController@registerMedicBD');
app()->post('/registerPatientBD','AutenticacionController@registerPatientBD');

//registerBD