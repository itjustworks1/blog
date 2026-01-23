@extends('layouts.front')
@section('sidebar')

    @parent

@endsection
@section('content')
    @foreach($posts as $post)
        <div class="card mb-3" >
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->description}}</p>
                        <a href="/post/{{$post->id}}">Читать полностью ...</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
