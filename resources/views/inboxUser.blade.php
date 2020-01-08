@extends(Auth::guest() ? "layout.guestLayout" : (Auth::user()->isAdmin == 1 ? "layout.adminLayout" : "layout.memberLayout"))

@section('title', 'My Inbox')

@section('content')
<style>
    .alert {
        width: 80%;
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

@if (Session('edit-success'))
    <div class="modifAlert">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{Session::get('edit-success')}}
        </div>
    </div>
@endif

@if (Auth::check())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach ($messages as $message)
                    @if ($message->user_receive_id == Auth::user()->id)
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="d-inline-flex">
                                            <div>
                                                <img class="profile_picture_user" src="{{ asset('storage/images/' . $message->User->profile_picture)}}" alt="Profile picture">
                                            </div>
                                            <div class="ml-3">
                                                <h4 class="mb-1">{{ $message->User->name }}</h4>
                                                <p class="mb-1"><b>Posted at : </b>{{ $message->messageCreationDate }}</p>
                                                <p class="mb-1"><b>Message : </b>{{ $message->message }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        @if (Auth::check())
                                            @if ($message->user_receive_id == Auth::user()->id)
                                                <form action="/homePage/inbox/{{ $message->id }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm text-white float-right">Remove</button>
                                                </form>        
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endif
                @endforeach

                <div>
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
@endif
@endsection