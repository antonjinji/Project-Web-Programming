@extends(Auth::user()->isAdmin == 1 ? 'layout.adminLayout' : 'layout.memberLayout')

@section('title', 'Add Question')

@section('content')
@if(!Auth::guest())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                    <div class="card-body bg-light">
                        <div class="header-text title">Add Question</div>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
