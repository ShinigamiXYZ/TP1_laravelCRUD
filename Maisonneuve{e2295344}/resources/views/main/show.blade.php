@extends('layout.master')
@section('title', '{{ $student->name }}')
@section('content')
@if(session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>{{session('success')}}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
   
<div><a href="{{route('main.index')}}" class="btn btn-success">Retour</a></div>
    <div class="container flex pt-20">
        <div class="card mb-3 text-center">
            <div class="card-body">
                <h5 class="card-title">{{ $student->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Address:</h6>
                <p class="card-text">{{ $student->address }}</p>
                <h6 class="card-subtitle mb-2 text-muted">Phone:</h6>
                <p class="card-text">{{ $student->phone }}</p>
                <h6 class="card-subtitle mb-2 text-muted">Email:</h6>
                <p class="card-text">{{ $student->email }}</p>
                <h6 class="card-subtitle mb-2 text-muted">Year of Birth:</h6>
                <p class="card-text">{{ $student->year_of_birth }}</p>
                <h6 class="card-subtitle mb-2 text-muted">Town ID:</h6>
                <p class="card-text">{{ $student->town_id }}</p>
                <a href="{{route('main.edit', $student -> id )}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>

@endsection