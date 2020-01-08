@extends('layout.guestLayout')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                <div class="card-body bg-light">
                    <div class="header-text title">Register</div>
                    <form method="POST" action="/registers" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}
                            <div class="col-md">
                                <input id="name" placeholder="Fullname" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                            <div class="col-md">
                                <input id="email" placeholder="Email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
                            <div class="col-md">
                                <input placeholder="Password" id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}
                            <div class="col-md">
                                <input placeholder="Confirm Password" id="password-confirm" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}">
                            </div>
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>


                        <div class="form-group row mb-3">
                            <div class="col-md">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="male" value="male" <?php if(old('gender') == "male") { echo 'checked="checked"'; } ?>>
                                    <label class="form-check-label @error('gender') is-invalid @enderror" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="female" value="female" <?php if(old('gender') == "female") { echo 'checked="checked"'; } ?>>
                                    <label class="form-check-label @error('gender') is-invalid @enderror" for="female">Female</label>
                                </div>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md">
                                <textarea name="address" id="address" rows="2" placeholder="Address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"></textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md">
                                <input type="date" name="birthday" id="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}">
                                @error('birthday')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md">
                                <input type="file" name="profile_picture" class="custom-file-input @error('profile_picture') is-invalid @enderror" id="profile_picture" value="{{ old('profile_picture') }}">
                                <label class="custom-file-label" for="profile_picture">Choose file</label>
                                @error('profile_picture')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md">
                                <button type="submit" class="btn btn-danger btn-block" value="Register">Register</button>
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
