@extends('layouts.front')
@section('sidebar')

    @parent

@endsection
@section('content')
    <div class="card mb-3" >
        <div class="row g-0">
{{--            <div class="col-md-4">--}}
{{--                <img src="..." class="img-fluid rounded-start" alt="...">--}}
{{--            </div>--}}
            <div class="col-md-12">
                <h5 class="card-title">{{$post->title}}</h5>
{{--                <p class="card-text">{{$post->description}}</p>--}}
                <p class="card-text">{{$post->content}}</p>
            </div>
        </div>
    </div>
@endsection
