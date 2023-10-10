@extends('base')

@section('content')
<div class="container col-md-6 offset-md-3 mt-5">
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h1 class="text-center">Login</h1>

    @if ($errors->any()) <!-- Check for validation errors -->
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group mb-3 mt-1 col-sm-10 offset-sm-1">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" id="email" class="form-control" class="form-control"
                    placeholder="Email" required="">
            </div>
        </div>

        <div class="form-group mb-3 mt-1 col-sm-10 offset-sm-1">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" id="password" class="form-control" class="form-control"
                    placeholder="Password" required="">
            </div>
        </div>

        <div class="container d-flex justify-content-between">
            <p class="signin" href="{{ '/register' }}"><span class="text-dark">
                    Don't have account an account?</span><a href="/register" class="text-dark">&nbsp;&nbsp;Sign in
                    now</a></p>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-sign-in"
                    aria-hidden="true"></i>&nbsp;Login
            </button>
        </div>
    </form>
</div>
@endsection

<style>
    body {
        background-color: red;
        /* background-image: url('https://i.gifer.com/LxAb.gif'); */
        /* background-image:url('images/background.png'); */
        /* background-repeat: no-repeat;

background-size: 100%;

background-attachment: fixed; */
    }

    .form {
        input {
            margin-bottom: 30px;
        }
    }

    a {
        color: hsl(0, 0%, 7%);
    }

    p.signin a {
        background: cornflowerblue;
        padding: 2px 10px;
        margin: 1px;
        border-radius: 12px;
        cursor: pointer;
        position: relative;
        display: inline-block;
    }
</style>
























