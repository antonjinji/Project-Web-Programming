@extends(Auth::user()->isAdmin == 1 ? 'layout.adminLayout' : 'layout.memberLayout')

@section('title', 'Insert Question')

@section('content')
@if(!Auth::guest())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                    <div class="card-body bg-light">
                        <div class="header-text title">Add Question</div>
                        <form method="POST" action="/homePage/manageQuestion" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md">
                                    <textarea name="question" class="form-control @error('question') is-invalid @enderror" id="address" rows="4" value="{{ old('question') }}"></textarea>
                                    @error('question')
                                        <div class="invalid-feedback">{{ $message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md">
                                    <select name ="topic" class="form-control @error('topic') is-invalid @enderror">
                                        @foreach ($topics as $topic)
                                            <option value="{{$topic->nameTopic}}">{{$topic->nameTopic}}</option>
                                        @endforeach
                                    </select>
                                    @error('topic')
                                        <div class="invalid-feedback">{{ $message}}</div>
                                    @enderror
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

