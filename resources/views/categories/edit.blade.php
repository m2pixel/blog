@extends('layouts.master')

@section('title','Create Posts')

@section('content')

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif


<h3 class="py-5 text-muted">Edit category</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.update',['category' => $category->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title"  class="form-label">Title</label>
      <input type="text" name="title" value="{{$category->title}}" class="form-control" id="title" >
    </div>
    <div class="mb-3">
        <label for="title"  class="form-label">Description</label>
        <input type="text" name="description" value="{{$category->description}}" class="form-control">
      </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection