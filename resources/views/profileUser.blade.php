@extends(Auth::guest() ? "layout.guestLayout" : (Auth::user()->isAdmin == 1 ? "layout.adminLayout" : "layout.memberLayout"))

@section('title', 'Profile User')

@section('content')
<style>
    .alert {
        width: 82%;
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

@if (Session('profileUpdate-success'))
    <div class="modifAlert">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ Session::get('profileUpdate-success') }}
        </div>
    </div>
@endif

@if (Session('sendMessage-succes'))
    <div class="modifAlert">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ Session::get('sendMessage-succes') }}
        </div>
    </div>
@endif

@if (Auth::check())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card w-100">
                <div class="card-body">
                    <div class="row">
                        @if (Auth::check())
                            @if ($user->id == Auth::user()->id)
                                <div class="col-md-10">
                                    <div class="d-inline-flex">
                                        <div>
                                            <img class="profile_picture_user" style="margin: 0" src="{{ asset('storage/images/' . $user->profile_picture) }}" alt="Profile User">
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="mb-1">{{ $user->name }}</h4>
                                            <p class="mb-1">{{ $user->email }}</p>
                                            <p class="mb-1">{{ $user->address }}</p>
                                            <p class="mb-0">{{ $user->birthday }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <a href="/homePage/profile/{{ $user->id }}/editProfilePage" class="btn btn-danger btn-sm text-white">Update Profile</a>
                                </div>
                            @elseif ($user->id != Auth::user()->id)
                                <div class="col-10">
                                    <div class="d-inline-flex">
                                        <div>
                                            <img class="profile_picture_user" style="margin: 0" src="{{ asset('storage/images/' . $user->profile_picture) }}" alt="Profile User">
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="mb-1">{{ $user->name }}</h4>
                                            <p class="mb-1">{{ $user->email }}</p>
                                            <p class="mb-1">{{ $user->address }}</p>
                                            <p class="mb-0">{{ $user->birthday }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::check() && $user->id != Auth::user()->id)
            <div class="col-md-10">
                <div class="card w-100">
                    <div class="card-body bg-light">
                        <form action="/homePage/profile/{{ $user->id }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md">
                                    <textarea name="message" class="form-control" id="message" rows="7" value="{{ old('message') }}"></textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md">
                                    <button type="submit" class="btn btn-danger btn-sm">Send Message</button>
                                </div>
                            </div
                        </form>
                    </div>
                </div>
            </div>
        @endif        
    </div>
</div>
@endif
@endsection
