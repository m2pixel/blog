@extends('layouts.master')

@section('title','Update Posts')

@section('content')
    <div>
        <div class="mt-4">
            <a href="{{route('categories.create')}}" class="btn btn-info text-white float-end">New category</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th>Description</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td scope="row">{{$category->title}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                        <a href="{{route('categories.edit',['category'=>$category->id])}}" class="btn btn-outline-info btn-sm">Edit</a>
                        <form action="{{route('categories.destroy',['category'=>$category->id])}}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
      </table>
    </div>
@endsection