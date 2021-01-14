@extends('layouts.master')

@section('title','Posts')

@section('content')
    <div class="mt-4">
        <a href="{{route('posts.create')}}" class="btn btn-info text-white float-end">New post</a>
    </div>
    <div class="row">
    

        @if($posts->count())
            @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <a href="{{route('posts.show',['post' => $post->id])}}"><img class="card-img-top" src="{{asset('images/' . $post->image)}}"  alt="{{$post->title}}"  data-holder-rendered="true"></a>
                  <div class="card-body">
                    <a class="text-decoration-none" href="{{route('posts.show',['post' => $post->id])}}"><h4 class="card-title text-muted">{{$post->title}}</h4></a>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            @foreach($post->categories as $c)
                                <span class="badge bg-info">#{{ $c->title }}</span>
                            @endforeach
                        </small>
                        <small class="text-muted">{{$post->created_at}}</small>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        @else
            @if(Session::has('message'))
                <div class="alert alert-danger">
                    {{ Session::get('message') }}
                </div>
            @else 
                <p>Blog is empty!</p>
            @endif
        @endif

        
    </div>
@endsection