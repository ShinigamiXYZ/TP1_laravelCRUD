@extends('layout.master')
@section('title', '{{ $student->name }}')
@section('content')
@if(session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>{{session('success')}}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
   
                <div class="container py-5">
  <div class="row justify-content-center ">
    <div class="col-md-6 ">
      <div class="card text-center shadow-lg">
        <div class="card-body">
          <h3 class="card-title">{{ $student->name }}</h3>
          <div class="card-subtitle mb-2 text-muted">
            <h6>Address:</h6>
            <p>{{ $student->address }}</p>
          </div>
          <div class="card-subtitle mb-2 text-muted">
            <h6>Phone:</h6>
            <p>{{ $student->phone }}</p>
          </div>
          <div class="card-subtitle mb-2 text-muted">
            <h6>Email:</h6>
            <p>{{ $student->email }}</p>
          </div>
          <div class="card-subtitle mb-2 text-muted">
            <h6>Year of Birth:</h6>
            <p>{{ $student->year_of_birth }}</p>
          </div>
          <div class="card-subtitle mb-2 text-muted">
            <h6>Town:</h6>
            @foreach($towns as $town)
              @if($town->id == $student->town_id)
                <p>{{ $town->name }}</p>
              @endif
            @endforeach
          </div>
          <a href="{{route('main.edit', $student->id)}}" class="btn btn-primary btn-block mt-4  py-2">Edit Profile</a>
        </div>
      </div>
    </div>
  </div>
</div>


      <div class="d-flex justify-content-center mt-4">
        <a href="{{route('main.index')}}" class="btn btn-success btn-lg px-5">Retour</a>
      </div>
    </div>
  </div>
</div>


@endsection