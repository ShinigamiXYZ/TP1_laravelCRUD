@extends('layout.master')
@section('title', 'student')
@section('content')

    <div class="container flex pt-20">
    <div><a href="{{route('main.show', $student -> id )}}" class="btn btn-success">Retour</a></div>
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
                <label for="town_id">Town ID:</label>
                <input type="text" class="form-control" id="town_id" name="town_id" value="{{ $student->town_id }}">
            </div>
<!-- 
    MODAL - BOOTSTRAP - UPDATE CONFIRMATION

 -->
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update">
  Update
</button>

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
 <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
  delete
</button>

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
        Voulez-vous vraiment modifier les informations?
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
