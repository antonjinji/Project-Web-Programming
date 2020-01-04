@extends('layout.guestLayout')

@section('title', 'Login')

@section('content')
<style>
    .alert {
        width: 47%; 
        padding: 20px;
        background-color: #4CAF50;
        color: white;
        margin-bottom: 15px;
    }
      
    /* The close button */
    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .modifAlert{
        width: 100%;
        display: flex;
        justify-content: center;
    }
      
    /* When moving the mouse over the close button */
    .closebtn:hover {
        color: black;
    }
</style>

@if (Session('success'))
    <div class="modifAlert">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{Session::get('success')}}
        </div>
    </div>
@endif

@if (Session('fail'))
<div class="modifAlert">
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{Session::get('fail')}}
    </div>
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                {{-- <div class="card-header align-content-lg-center">{{ __('Login') }}</div> --}}
                <div class="card-body bg-light">
                    <div class="header-text">Log in</div>
                    <form method="POST" action="{{url('/login')}}">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                            <div class="col-md">
                                <input id="email" placeholder="Email" name="email" type="email" class="form-control" value="{{ Cookie::get('email') }}" required autocomplete="email" autofocus>

                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
                            <div class="col-md">
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" value="{{ Cookie::get('password') }}" required autocomplete="current-password">

                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md">
                                <button type="submit" class="btn btn-danger btn-block" value="Login">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
