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

    public function show($studentId)
    {
        $student = Student::findOrFail($studentId);
        
        return view('main.show', compact('student')); // == ['student' => $student]); Si on veu que la clef soit identique a la variable compact est une variation
    }

    public function edit($studentId){
        $student = Student::findOrFail($studentId);
        return view('main.edit', compact('student')); // == ['student' => $student]); Si on veu que la clef soit identique a la variable compact est une variation

    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->only(['name', 'address', 'phone', 'email', 'year_of_birth', 'town_id']));
    
        return redirect()->route('main.show', $request->only('id'));
    }
}
