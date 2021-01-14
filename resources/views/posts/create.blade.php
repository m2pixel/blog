@extends('layouts.master')

@section('title','Create Posts')

@section('content')

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

<h3 class="py-3 text-muted">Create post</h3>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- @can('create-post', auth()->user()) --}}
<form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="mb-3">
      <label for="title"  class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="title" >
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Content</label><br>
      <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" id="image">
    </div>
    <div class="mb-3">
        <select class="form-select" name="categories">
            <option selected>Open this select menu</option>
            @if($categories && $categories->count())
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            @endif
          </select>
    </div>
    <button type="submit" class="btn btn-info text-white">Create</button>
  </form>
  {{-- @endcan --}}
@endsection