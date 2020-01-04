@extends(Auth::user()->isAdmin == 1 ? 'layout.adminLayout' : 'layout.memberLayout')

@section('title', 'Add Question')

@section('content')
@if(!Auth::guest())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                    <div class="card-body">
                        <div class="header-text">Add Question</div>
                        <form method="POST" action="/homePage" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md">
                                    <textarea class="form-control" name="question" id="address" rows="4" value="{{ old('question') }}" required autocomplete="question"></textarea>

                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md">
                                    <select class="form-control" name ="topic" required autocomplete="topic">
                                        @foreach ($topics as $topic)
                                            <option value="{{$topic->nameTopic}}">{{$topic->nameTopic}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md">
                                    <button type="submit" class="btn btn-danger btn-block">
                                        Submit
                                    </button>
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
@endif
@endsection
