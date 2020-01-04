@extends(Auth::user()->isAdmin == 1 ? "layout.adminLayout" : "layout.memberLayout")

@section('title', 'Manage User')

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

@if (Session('delete-success'))
    <div class="modifAlert">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{Session::get('delete-success')}}
        </div>
    </div>
@endif

@if (Session('success'))
    <div class="modifAlert">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{Session::get('success')}}
        </div>
    </div>
@endif

    <div class="container" >
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-danger btn-sm"><a href="/homePage/manageUser/insertUserPage" class="badge badge-danger fontFamilyAddUser">Add User</a></button>
                <h2 class="">Manage User</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="align-content: center">
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Email</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Address</th>
                                <th scope="col">Profile Picture</th>
                                <th scope="col">DOB</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    @if ($user->isAdmin == 1)
                                        <td>Admin</td>
                                    @else
                                        <td>Member</td>
                                    @endif
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->gender}}</td>
                                    <td>{{ $user->address}}</td>
                                    <td><img class="picture_user" src="{{ asset('storage/images/' . $user->profile_picture) }}" alt="profile user"></td>
                                    <td>{{ $user->birthday}}</td>
                                    <td>
                                        {{-- <form action="/admin/manage_users/{{$user->id}}/edit" method="post" class="d-inline">
                                            @csrf
                                            <button class="btn btn-warning btn-sm" type="submit">Edit</button>
                                        </form> --}}
                                        <a href="/homePage/manageUser/{{ $user->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/homePage/manageUser/{{ $user->id }}" method="POST" class="d-inline">
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

                <div class="paginate">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
