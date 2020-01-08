@extends(Auth::guest() ? "layout.guestLayout" : (Auth::user()->isAdmin == 1 ? "layout.adminLayout" : "layout.memberLayout"))

@section('title', 'Homepage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card w-100">
                <div class="card-body">
                    <div class="fontFamily">
                        <div class="row">
                            <div class="col-10">
                                <p>{{ $question->Topic->nameTopic }}</p>
                            </div>
                            <div class="col-2">
                                {{-- cek dlu auth nya --}}
                                @if (Auth::check())
                                    {{-- open->0, close->1 --}}
                                    @if ($question->status == 0)
                                        <a href="/homePage/myQuestion/status/{{ $question->id }}" class="btn btn-warning btn-sm text-black" type="submit">Closed</a>
                                        <span class="border border-success bg-success rounded text-white">Open</span>
                                        {{-- <a href="" class="btn btn-default btn-warning btn-sm">Closed</a> --}}
                                    @elseif ($question->status == 1)
                                        <span class="border border-danger bg-danger rounded text-black float-right">Closed</span>
                                    @endif
                                @else
                                    @if ($question->status == 0)
                                        <span class="border border-success bg-success rounded text-white float-right">Open</span>
                                    @elseif ($question->status == 1)
                                        <span class="border border-danger bg-danger rounded text-black float-right">Closed</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <h4>{{ $question->question }}</h4>
                        <div class="display">
                            <div>
                                <img class="rounded-circle profile_picture" src="{{ asset('storage/images/' . $question->User->profile_picture) }}" alt="Profile picture">
                            </div>
                            <div class="display_block">
                                <p class="username" style="color: red">{{ $question->User->name }}</p>
                                <p class="time">{{ $question->questionCreationDate }}</p>
                            </div>
                        </div>
                    </div>
                    <p style="margin-top: 15px"></p>

                    @foreach ($question->Answer as $answer)
                        {{-- <div class="col-md-12"> --}}
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="fontFamily">
                                        <div class="row">
                                            <div class="col-12">
                                                <div style="display: flex">
                                                    <div>
                                                        <img class="rounded-circle profile_picture" src="{{ asset('storage/images/' . $answer->User->profile_picture) }}" alt="Profile picture">
                                                    </div>
                                                    <div class="display_block">
                                                        <p class="username" style="color: black">{{ $answer->User->name }}</p>
                                                        <p class="time">Answered at {{ $answer->answerCreateDate }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{ $answer->answer}}
                                    </div>
                                </div>
                            </div>
                        {{-- </div> --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
