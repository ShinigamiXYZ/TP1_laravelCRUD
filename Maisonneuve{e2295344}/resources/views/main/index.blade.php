@extends('layout.master')
@section('title', 'student list')
@section('content')

<div class="container">
      <div class="row mt-4">
        <div class="col-12 text-center">
          <h1 class="display-5">{{ config('app.name') }}</h1>
        </div>
      </div>

      <hr>

      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              Liste utilisateur
            </div>
            <div class="card-body">
              <ul class="list-group">
                @forelse($studentList as $student)
                  <li class="list-group-item">{{ $student->name }}</li>
                @empty
                  <li class="list-group-item">Aucun utilisateur disponible</li>
                @endforelse
              </ul>
            </div>
            <div class="card-footer">
            <div class="pagination">
             {{ $studentList}}
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection