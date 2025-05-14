<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
    public function index()
    {
        //Direcciona a la vista principal del sistema
        return view('home');
    }
}
