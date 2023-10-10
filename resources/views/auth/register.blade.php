@extends('base')

@section('content')



<div class="container col-md-6 offset-md-3 mt-5">
    <h1 class="text-center">Register</h1>
    <form action="{{'/register'}}" method="POST">
        {{csrf_field()}}

        <div class="form-group mb-3 mt-1 col-sm-10 offset-sm-1">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                <input type="text" name="name" id="name" class="form-control" class="form-control"
                    placeholder="Name" required="">
                <label for="Name"></label>
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group mb-3 mt-1 col-sm-10 offset-sm-1">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                    required="">
                <label for="email"></label>
                {{-- <input type="email" name="email" id="email" class="form-control"> --}}
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group mb-3 mt-1 col-sm-10 offset-sm-1">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                    required="">
                <label for="password"></label>
                {{-- <input type="password" name="password" id="password" class="form-control"> --}}
                @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group mb-3 mt-1 col-sm-10 offset-sm-1">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                <input type="password" name="password_confirmation" id="confirm_password" class="form-control"
                    placeholder="Confirm password" required="">
                <label for="confirm_password"></label>
                {{-- <input type="password" name="password_confirmation" id="confirm_password" class="form-control"> --}}
            </div>
        </div>

        <div class="d-flex mt-3">
            <div class="flex-grow-1 text-light">
                <p class="signin" href="{{ '/' }}"><span class="text-dark">
                        Already have an account?</span><a href="/" class="text-dark">Sign up now</a></p>
                <div class="container d-flex justify-content-between">
                    <a href="{{ '/' }}"></a>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-registered"
                            aria-hidden="true"></i>&nbsp;Register
                    </button>
                </div>
            </div>

        </div>
        {{-- <div class="d-flex">
            <div class="flex-grow-1">
                <a href="{{'/'}}">Already have an account?</a>
            </div>
            <button class="btn btn-primary px-5" type="submit">Register</button>
        </div> --}}
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
        padding: 5px 20px;
        margin: 4px;
        border-radius: 12px;
        cursor: pointer;
        position: relative;
        display: inline-block;
    }

    p.signin {
        font-size: 1.1rem;
        margin: 10px;
    }

    p.signin * {
        white-space: pre;

    }
</style>