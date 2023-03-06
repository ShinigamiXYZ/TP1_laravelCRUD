@extends('layout.master')
@section('title', 'student')
@section('content')

    <div class="container flex pt-20">
   
        <form method="POST">
            @csrf
            @method('PUT')
            <div class="d-none">
            <label for="id">Id</label>
                <input type="text" class="form-control" id="id" name="id" value="}">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="">
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $student->address ?? '' }}">
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="">
            </div>

            <div class="form-group">
                <label for="year_of_birth">Year of Birth:</label>
                <input type="text" class="form-control" id="year_of_birth" name="year_of_birth" value="">
            </div>

            <div class="form-group">
                <label for="town_id">Town ID:</label>
                <input type="text" class="form-control" id="town_id" name="town_id" value="">
            </div>
<!-- 
    MODAL - BOOTSTRAP - UPDATE CONFIRMATION

 -->
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
  Creation
</button>

<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createLabel">Creation étudiant</h5>
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

    </div>

@endsection
