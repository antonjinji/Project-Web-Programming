@extends('layout.guestLayout')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                <div class="card-body">
                    <div class="header-text">Register</div>
                    <form method="POST" action="/registers" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}
                            <div class="col-md">
                                <input id="name" placeholder="Fullname" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                            <div class="col-md">
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">

                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
                            <div class="col-md">
                                <input placeholder="Password" id="password" type="password" class="form-control" name="password" required autocomplete="new-password">

                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}
                            <div class="col-md">
                                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        </div>


                        <div class="form-group row mb-2">
                            <div class="col-md">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if(old('gender')== "male") { echo 'checked="checked"'; } ?>>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if(old('gender')== "female") { echo 'checked="checked"'; } ?>>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>

                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md">
                                <textarea class="form-control" name="address" id="address" rows="2" placeholder="Address" value="{{ old('address') }}" required autocomplete="address"></textarea>

                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md">
                                <input type="date" name="birthday" id="birthday" class="form-control" value="{{ old('birthday') }}" required autocomplete="birthday">

                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('birthday') }}</strong>
                                </span>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md">
                                <input type="file" class="custom-file-input" name="profile_picture" id="profile_picture" required autocomplete="profile_picture">
                                <label class="custom-file-label" for="profile_picture">Choose file</label>

                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('profile_picture') }}</strong>
                                </span>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md">
                                <button type="submit" class="btn btn-danger btn-block" value="Register">
                                    Register
                                </button>
                            </div>
                        </div>

                        @if (Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{Session::get('success')}}</strong>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
