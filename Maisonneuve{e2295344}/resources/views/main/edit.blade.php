@extends('layout.master')
@section('title', 'edit')
@section('content')
<div class="text-center mt-2"><a href="{{route('main.show', $student -> id )}}" class="btn btn-success">Retour</a></div>
<div class="container py-5">
<h1 class="text-center mt-5 mb-4 ">Modififications utilisateur</h1>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form method="POST">
            @csrf
            @method('PUT')
            <div class="d-none">
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
    <label for="town_id">Select Town:</label>
    <select class="form-control" id="town_id" name="town_id">
        @foreach($towns as $town)
            @if($town->id == $student->town_id)
                <option value="{{ $town->id }}" selected>{{ $town->name }}</option>
            @else
                <option value="{{ $town->id }}">{{ $town->name }}</option>
            @endif
        @endforeach
    </select>
</div>
<!-- 
    MODAL - BOOTSTRAP - UPDATE CONFIRMATION

 -->
 <!-- Button trigger modal -->
<div class="container text-center pt-3">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update">
    Update
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateLabel">Confirmation de changements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment modifier les informations?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
    </div>
  </div>
</div>

 <!-- END </ MODAL - UPDATE CONFIRMATION -->
           
            
        </form>

        <form method="POST" action="{{ route('main.delete', $student->id ) }}">
            @csrf
            @method('DELETE')
            <div class="d-none">
            <label for="name">Id</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $student->id }}">
            </div>
            

            <!-- 
    MODAL - BOOTSTRAP - DeleteCONFIRMATION

 -->
 <div class="container text-center pt-3">
 <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
  delete
</button>
 </div>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteLabel">Confirmation de changements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer cette utilisateur?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

 <!-- END </ MODAL - Delete CONFIRMATION -->

          
        </form>
    </div>

@endsection
