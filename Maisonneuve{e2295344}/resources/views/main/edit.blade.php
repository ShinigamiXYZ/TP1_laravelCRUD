@extends('layout.master')
@section('title', '{{ $student->name }}')
@section('content')

    <div class="container flex pt-20">
        <form method="POST">
            @csrf
            @method('PUT')
            <div class="hidden">
            <label for="name">Id</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $student->id }}">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $student->address }}">
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}">
            </div>

            <div class="form-group">
                <label for="year_of_birth">Year of Birth:</label>
                <input type="text" class="form-control" id="year_of_birth" name="year_of_birth" value="{{ $student->year_of_birth }}">
            </div>

            <div class="form-group">
                <label for="town_id">Town ID:</label>
                <input type="text" class="form-control" id="town_id" name="town_id" value="{{ $student->town_id }}">
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            
        </form>

        <form method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
        </form>
    </div>

@endsection
