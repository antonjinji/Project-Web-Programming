@extends(Auth::user()->isAdmin == 1 ? 'layout.adminLayout' : 'layout.memberLayout')

@section('title', 'Insert Topic')

@section('content')
@if(!Auth::guest())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                    <div class="card-body bg-light">
                        <div class="header-text title">Add Topic</div>
                        <form method="POST" action="/homePage/manageTopic/" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}
                                <div class="col-md">
                                    <input id="topic" placeholder="Topic" type="text" class="form-control @error('topic') is-invalid @enderror" name="topic" value="{{ old('topic') }}">
                                    @error('topic')
                                        <div class="invalid-feedback">{{ $message}}</div>
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
