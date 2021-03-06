@extends(Auth::user()->isAdmin == 1 ? "layout.adminLayout" : "layout.memberLayout")

@section('title', 'Manage Question')

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

@if (Session('addQuestion-success'))
    <div class="modifAlert">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{Session::get('addQuestion-success')}}
        </div>
    </div>
@endif

@if (Session('update-success'))
    <div class="modifAlert">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{Session::get('update-success')}}
        </div>
    </div>
@endif

@if (Session('delete-success'))
    <div class="modifAlert">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{Session::get('delete-success')}}
        </div>
    </div>
@endif

    <div class="container" >
        <div class="row">
            <div class="col-12">
                <a href="/homePage/manageQuestion/insertQuestionPage" class="btn btn-danger">Add Question</a></button>
                <h2 class="">Manage Question</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="align-content: center">
                                <th scope="col">#</th>
                                <th scope="col">Topic</th>
                                <th scope="col">Owner</th>
                                <th scope="col">Question</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($questions as $question)
                                <tr>
                                    <th scope="row">{{ $question->id }}</th>
                                    <td>{{ $question->Topic->nameTopic }}</td>
                                    <td>{{ $question->User->name }}</td>
                                    <td class="text-danger">{{ $question->question}}</td>
                                    @if ($question->status == 0)
                                        <td><span class="border border-success bg-success rounded text-white">Open</span></td>
                                    @elseif ($question->status == 1)
                                        <td><span class="border border-danger bg-danger rounded text-black">Closed</span></td>
                                    @endif
                                    <td>
                                        @if ($question->status == 0)
                                            <a href="/homePage/manageQuestion/{{ $question->id }}" class="btn btn-secondary btn-sm">Closed</a>
                                        @endif
                                        <a href="/homePage/manageQuestion/{{ $question->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/homePage/manageQuestion/{{ $question->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div>
                    {{$questions->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
