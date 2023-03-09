@extends('layout.master')
@section('title', 'student')
@section('content')
<div class="text-center mt-2"><a href="{{route('main.index')}}" class="btn btn-success ">Retour</a></div>
<div class="container py-5">
<h1 class="text-center mt-5 mb-4 ">Création utilisateur</h1>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}"> <!-- Si la page est rediriger apres erreur , old va garder l'informations entre par l'utilisateurs -->
        @error('name')
            <div class="text-danger">{{ $message }}</div> <!-- Affiche le message d'erreur personnaliser en lien avec la validations creer dans studentController -->
        @enderror
    </div>

    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" value="{{ old('address') }}">
        @error('address')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}">
        @error('phone')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}">
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="year_of_birth">Year of Birth:</label>
        <input type="text" class="form-control" id="year_of_birth" name="year_of_birth" placeholder="Enter your year of birth" value="{{ old('year_of_birth') }}">
@error('year_of_birth')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
    <label for="town_id">Select Town:</label>
    <select class="form-control" id="town_id" name="town_id">
        @foreach($towns as $town)
            <option value="{{ $town->id }}" {{ old('town_id') == $town->id ? 'selected' : '' }}>{{ $town->name }}</option>
        @endforeach
    </select>
    @error('town_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>





   
  
<!-- 
    MODAL - BOOTSTRAP - UPDATE CONFIRMATION

 -->
 <!-- Button trigger modal -->
<div class="container text-center pt-3">
  <button type="button" class="btn btn-primary px-2" data-toggle="modal" data-target="#create">
    Création
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createLabel">Création étudiant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment creer un nouvel utilisateurs
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
    </div>
  </div>
</div>
</form>
    </div>
  </div>
</div>
    </div>

@endsection
