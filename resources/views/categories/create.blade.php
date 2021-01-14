@extends('layouts.master')

@section('title','Create category')

@section('content')

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif


<h3 class="py-3 text-muted">Create category</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="title"  class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="title" >
    </div>
    <div class="mb-3">
        <label for="title"  class="form-label">Description</label>
        <input type="text" name="description" class="form-control">
      </div>
    
    <button type="submit" class="btn btn-info text-white">Create</button>
  </form>

@endsection