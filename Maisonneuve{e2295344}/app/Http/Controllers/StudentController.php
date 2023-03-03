<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        //SELECT * FROM blog_posts;
        $student= Student::all();
        $student= Student::simplePaginate(15); // Change 10 to the number of records you want to display per page
        return view('main.index', ['studentList' => $student]);
        
    }
}
