<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        
        $student= Student::all();
        $student= Student::simplePaginate(15);
        return view('main.index', ['studentList' => $student]);
        
    }
}
