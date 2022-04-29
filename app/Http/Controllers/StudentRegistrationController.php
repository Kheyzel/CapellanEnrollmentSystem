<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
    public function index()
    {
        return view ('studentRegistration.index');
    }
}
