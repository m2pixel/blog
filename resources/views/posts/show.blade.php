@extends('layouts.master')

@section('title', $post->title)

@section('content')
    <div class="container pt-3">
        <div class="row">
            <div class="col">
                <img src="{{asset('images/' . $post->image)}}" class="img-fluid" alt="">
                <div class="d-flex justify-content-around pt-3">
                    <div>
                        @foreach($post->categories as $c)
                            <span class="badge bg-primary">#{{ $c->title }}</span>
                        @endforeach
                    </div>
                    <div>
                        <span class="float-end">{{$post->created_at}}</span>
                    </div>
                    <div>
                        @can('update',$post)
                        <a href="{{route('posts.edit',['post'=>$post->id])}}" class="btn btn-outline-primary btn-sm">Edit</a>
                        @endcan
                        <form action="{{route('posts.destroy',['post'=>$post->id])}}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </div>
                    <div>
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <h3>{{$post->title}}</h3>
                <p>{{$post->content}}</p>
            </div>
        </div>
    </div>
@endsection