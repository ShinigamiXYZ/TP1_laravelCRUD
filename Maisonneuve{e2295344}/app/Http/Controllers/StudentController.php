<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Town;
class StudentController extends Controller
{
    public function index()
    {
        
        $student= Student::all();
        $student= Student::simplePaginate(15);
        return view('main.index', ['studentList' => $student]);
        
    }

    public function create(){
        $towns = Town::all();

        return view('main.create', ['towns'=>$towns]);
    }
    public function store(Request $request){
      
        $data = $request->only(['name', 'address' , 'phone', 'email', 'year_of_birth', 'town_id']);
        /* Ajout de validation + tard */
     
        $student = Student::create($data);
    
        return redirect(route('main.show', $student->id))->withSuccess('Student created successfully.'); 
    }




    public function show($studentId)
    {
        $towns = Town::all();
        $student = Student::findOrFail($studentId);
        
        return view('main.show', compact('student','towns')); // == ['student' => $student]); Si on veu que la clef soit identique a la variable compact est une variation
    }

    public function edit($studentId){
        $towns = Town::all();
        $student = Student::findOrFail($studentId);
        return view('main.edit', compact('student','towns')); // == ['student' => $student]); Si on veu que la clef soit identique a la variable compact est une variation

    }

    public function update(Request $request)
    {
       
        $student = Student::findOrFail($request->id);
     
        $student->update($request->only(['name', 'address' , 'phone', 'email', 'year_of_birth', 'town_id']));
        /* voir pk adress de passe pas. */
        return redirect(route('main.show', $request->id))->withSuccess('Informations mis a jour');
       
        
    }
    public function destroy(Request $request)
    {
       
        $student = Student::find($request->id);
       
        $student::destroy([$request->id]);
      
        return redirect(route('main.index'))->withSuccess('utilisateur supprimer');
       
        
    }
}
