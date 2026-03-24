<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container mb-5">
    <div class="row">
        <div class="col border rounded p-5 text-center">
            <h1>{{$page_title}}</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-4">

                <div class="card">
                    <div class="card-header">
                        Категории
                    </div>
                    <div class="card-body">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            @foreach($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/category/{{$category->id}}">{{$category->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @auth
            <div class="card mt-2">
                <div class="card-header">
                    Информация о пользователе
                </div>
                <div class="card-body">
                    <!-- Content displayed only to authenticated users -->
                    <p>Welcome, {{ Auth::user()->name }}</p>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <button type="submit" value="Logout" class="btn btn-outline-primary">Logout</button>
                    </form>

                </div>
            </div>
            @endauth
            @section('sidebar')
            @endsection
        </div>
        <div class="col-8">
            @yield('content')
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
