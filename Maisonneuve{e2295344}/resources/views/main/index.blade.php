@extends('layout.master')
@section('title', 'student list')
@section('content')



<div class="container">
    
    <h1>Student List</h1>
    <div><a href="{{route('main.create')}}"class="btn btn-info">
        Ajout 
    </a></div>
    @if(session('success'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong>{{session('success')}}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
    
    <div class="row">
        @foreach($studentList as $student)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card bg-teal">
                    <div class="card-body">
                        <h5 class="card-title">{{ $student->name }}</h5>
                        <p class="card-text">{{ $student->email }}</p>
                        <a href="{{route('main.show', $student -> id )}}" class="btn btn-primary">View Profile</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $studentList}}
</div>
            
           
          
@endsection