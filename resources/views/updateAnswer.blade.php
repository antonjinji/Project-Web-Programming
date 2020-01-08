@extends(Auth::user()->isAdmin == 1 ? 'layout.adminLayout' : 'layout.memberLayout')

@section('title', 'Update Question')

@section('content')
@if(!Auth::guest())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                    <div class="card-body">
                        <div class="header-text title">Edit Answer</div>
                        <form method="POST" action="/homePage/answer/{{ $answer->id }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group row">
                                <div class="col-md">
                                    <textarea name="answer" class="form-control @error('question') is-invalid @enderror" id="address" rows="4" value="{{ old('answer') }}">{{ $answer->answer }}</textarea>
                                    @error('answer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md">
                                    <button type="submit" class="btn btn-danger btn-block">Submit</button>
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

