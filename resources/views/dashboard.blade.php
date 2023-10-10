@extends('base')

@section('content')
<nav class="navbar navbar-expand-lg border-bottom bg-primary ">
    <div class="container-fluid">
        <a class="navbar-brand" href="/dashboard">
        <img src="data:image/png;base64,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" alt="" style="width: 50px; margin: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ">
                <a class="nav-link active text-white" aria-current="page" href="/">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="/">Email</a>
            </li>
        </ul>
           <div style="position: relative;">
            {{-- <a class="nav-link dropdown-toggle fs-6 text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 You are logged in as {{ auth()->user()->name }} 
              </a> --}}
              {{-- <ul class="dropdown-menu" style="left: 70px; top: 50px;"> --}}
                
                    <form method="POST" action="{{ route('logout') }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-secondary btn-block text-start text-dark\[]" style="border: none; width: 100%;" >Logout</button>
                    </form>
                
            {{-- </ul> --}}
           </div>

        </div>
    </div>
</nav>
<div class="container col-md-8 mt-5">

    <h5 class="mb-0">Welcome, @auth {{ Auth::user()->name }}! @endauth</h5>
</div>
@endsection

<style>
    body {
        background-color: red;
    background-image: url('https://media.gettyimages.com/vectors/rainbow-paint-splash-vector-id1144674497')
        
        /* background-repeat: no-repeat;

            background-size: 100%;

            background-attachment: fixed; */
    }

</style>
