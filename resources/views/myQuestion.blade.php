@extends(Auth::guest() ? "layout.guestLayout" : (Auth::user()->isAdmin == 1 ? "layout.adminLayout" : "layout.memberLayout"))

@section('title', 'My Question')

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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach ($questions as $question)
                <div class="card w-100">
                    {{-- <div class="container"> --}}
                        <div class="card-body">
                            <div class="fontFamily">
                                <div class="row">
                                    <div class="col-10">
                                        <p>{{ $question->Topic->nameTopic }}</p>
                                        <h4>{{ $question->question }}</h4>
                                        <div class="display">
                                            <div>
                                                <img class="rounded-circle profile_picture" src="{{ asset('storage/images/' . $question->User->profile_picture)}}" alt="Profile picture">
                                            </div>
                                            <div class="display_block">
                                                <a href="/homePage/profile/{{ $question->User->id }}" class="username" style="text-decoration: none">{{$question->User->name}}</a>
                                                <p class="time"><b>Create At: </b>{{$question->questionCreationDate}}</p>
                                            </div>
                                        </div>
                                        <a href="/homePage/myQuestion/{{ $question->id }}" class="btn btn-primary btn-sm button text-white">See Answer</a>
                                        <a href="/homePage/myQuestion/{{ $question->id }}/editQuestionPage" class="btn btn-warning btn-sm button text-black">Edit</a>
                                        <form action="/homePage/myQuestion/{{ $question->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    </div>

                                    <div class="col-2">
                                        {{-- open->0, close->1 --}}
                                        @if ($question->status == 0)
                                            <span class="border border-success bg-success rounded text-white float-right">Open</span>
                                        @elseif ($question->status == 1)
                                            <span class="border border-danger bg-danger rounded text-black float-right">Closed</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
                <br>
            @endforeach

            <div>
                {{$questions->links()}}
            </div>
        </div>
    </div>
</div>
@endsection