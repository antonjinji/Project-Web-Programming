@extends(Auth::guest() ? "layout.guestLayout" : (Auth::user()->isAdmin == 1 ? "layout.adminLayout" : "layout.memberLayout"))

@section('title', 'Homepage')

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

@if (Session('success'))
    <div class="modifAlert">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{Session::get('success')}}
        </div>
    </div>
@endif

<div class="container" style="height: 100%">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row mb-1">
                <div class="col-5">
                    <form action="/homePage">
                        <div class="form-group">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input name="search" type="search" class="form-control" style="padding-left: 35px;" placeholder="Search by Question or Username">
                        </div>
                    </form>
                </div>
            </div>

            @foreach ($questionsAndEtc as $questionAndEtc)
                <div class="card w-100">
                    <div class="container">
                        <div class="card-body">
                            <div class="fontFamily">
                                {{-- <p>{{\App\Topic::find($questionAndEtc->topic_id)->first()->nameTopic}}</p> --}}
                                <p>{{$questionAndEtc->Topic->nameTopic}}</p>
                                <h4>{{$questionAndEtc->question}}</h4>
                                <div class="display">
                                    <div>
                                        <img class="rounded-circle profile_picture" src="{{ asset('storage/images/' . $questionAndEtc->User->profile_picture)}}" alt="Profile picture">
                                    </div>
                                    <div class="display_block">
                                        <p class="username">{{$questionAndEtc->User->name}}</p>
                                        <p class="time"><b>Create At: </b>{{$questionAndEtc->questionCreationDate}}</p>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger btn-sm button_answer">Answer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach

            <div class="paginate">
                {{$questionsAndEtc->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
