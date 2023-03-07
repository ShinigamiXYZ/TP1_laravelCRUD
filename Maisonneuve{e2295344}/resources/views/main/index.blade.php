@extends('layout.master')
@section('title', 'student list')
@section('content')



<div class="container">
    
<h1 class="text-center mt-5 mb-4">Student List</h1>

<div class="d-flex justify-content-center mb-4">
    <a href="{{route('main.create')}}" class="btn btn-primary">Add Student</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>{{session('success')}}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach($studentList as $student)
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{ asset('bgImage.jpeg') }}" class="card-img-top" alt="NewHouse king">
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