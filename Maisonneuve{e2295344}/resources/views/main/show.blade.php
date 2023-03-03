@extends('layout.master')
@section('title', '{{ $student->name }}')
@section('content')

   

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