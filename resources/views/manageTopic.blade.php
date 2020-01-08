@extends(Auth::user()->isAdmin == 1 ? "layout.adminLayout" : "layout.memberLayout")

@section('title', 'Manage Topic')

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

@if (Session('addTopic-success'))
    <div class="modifAlert">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{Session::get('addTopic-success')}}
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
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <a href="/homePage/manageTopic/addTopicPage" class="btn btn-danger">Add Topic</a>
                <h2 class="">Manage Topic</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="align-content: center">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($topics as $topic)
                                <tr>
                                    <th scope="row">{{ $topic->id }}</th>
                                    <td>{{ $topic->nameTopic }}</td>
                                    <td>
                                        <a href="/homePage/manageTopic/{{ $topic->id }}/editTopicPage" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/homePage/manageTopic/{{ $topic->id }}" method="POST" class="d-inline">
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
                    {{ $topics->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
