<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index()
    {
        return Inertia::render('Student/index');
    }

    public function all()
    {
        return Inertia::render('Student/all');
    }
}
