<?php

namespace App\Controllers;

use App\Controllers\Controller;
class IndexController extends Controller
{
    public function index()
    {
        return render("index");
    }
}