<?php

namespace App\Http\Controllers;

use domain\Facades\StudentFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index()
    {
        return Inertia::render('Student/index');
    }

    public function show()
    {
        return Inertia::render('Student/all');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        return StudentFacade::store($request->all());
    }

    public function list()
    {
        $students = StudentFacade::all();
        return response()->json($students);
    }

    public function get($student_id)
    {
        $student = StudentFacade::get($student_id);
        return response()->json($student);
    }

    public function status($student_id)
    {
        return StudentFacade::status($student_id);
    }

    public function update(Request $request, $student_id)
    {
        return StudentFacade::update($request->all(), $student_id);
    }

    public function delete($student_id)
    {
        return StudentFacade::delete($student_id);
    }
}
