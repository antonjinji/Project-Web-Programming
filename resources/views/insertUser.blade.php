@extends(Auth::user()->isAdmin == 1 ? "layout.adminLayout" : "layout.memberLayout")

@section('title', 'Insert New User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                <div class="card-body">
                    <div class="header-text">Create User</div>
                    <form method="POST" action="{{ url('/homePage/manageUser') }}" enctype="multipart/form-data">
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
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md">
                                <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                    <option value="Admin">Admin</option>
                                    <option value="Member">Member</option>
                                </select>

                                @error('role')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
                            <div class="col-md">
                                <input placeholder="Password" id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">

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


                        <div class="form-group row mb-2">
                            <div class="col-md">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="male" value="male" <?php if(old('gender')== "male") { echo 'checked="checked"'; } ?>>
                                    <label class="form-check-label @error('gender') is-invalid @enderror" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="female" value="female" <?php if(old('gender')== "female") { echo 'checked="checked"'; } ?>>
                                    <label class="form-check-label @error('gender') is-invalid @enderror" for="female">Female</label>
                                </div>

                                @error('gender')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md">
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" rows="2" placeholder="Address" value="{{ old('address') }}"></textarea>

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
                                <button type="submit" class="btn btn-danger btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
