@extends(Auth::guest() ? 'layout.guestLayout' : (Auth::user()->admin ? 'layout.adminLayout' : 'layout.memberLayout'))

@section('title', 'Homepage')

@section('content')
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

            <div class="card w-100">
                <div class="container">
                    <div class="card-body">
                        @foreach ($questions as $question)
                            {{$question->question}}
                            {{\App\Topic::find($question->topic_id)->first()->nameTopic}}
                        @endforeach
                    </div>

                    <div>
                         {{-- {{$questions->links()}} --}}
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
