
@extends('dashboard.game_ui')

@section("title") Game & Software Zone Myanmar @endsection

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center border border-dark" style="background: rgba(11,15,18,0.6); ">
            <h2 class="col-12 mt-4 mb-2 pb-4 pt-3 text-center text-white " style="line-height: 53px;">Suggest Our Website Design</h2>
            @isset($finish)
                <h5 id="finish" class="col-12 text-danger shadow-lg font-weight-bold text-center pb-4" style="line-height: 30px">{{ $finish }}</h5>
            @endisset
            <div class="col-12 col-md-8">
                <form class="text-light pb-5" action="{{ route('suggestGame.storeSuggest') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input required type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="your name">
                        @error('name')
                        <small class="invalid-feedback font-weight-bold" role="alert">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Your Phone Number</label>
                        <input required type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{old('phone')}}" placeholder="phone number">
                        @error('phone')
                        <small class="invalid-feedback font-weight-bold" role="alert">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input required type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}" placeholder="email address">
                        @error('email')
                        <small class="invalid-feedback font-weight-bold" role="alert">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Your Suggest</label>
                        <textarea required name="description" id="description" class="form-control @error('description') is-invalid @enderror" name="description" id=""  rows="7">{{old('description')}}</textarea>
                        @error('description')
                        <small class="invalid-feedback font-weight-bold" role="alert">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-block text-light py-2" style="background-color: #a81d1d" ><i class="fas fa-plus-square mr-1"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>



@endsection
@section('foot')
    <script>
        $(document).ready(function() {
            $('#finish').fadeOut(7000);
        });
    </script>
@endsection




