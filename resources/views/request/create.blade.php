
@extends('dashboard.game_ui')

@section("title")Mod Games Myanmar @endsection

@section('content')
    <div class="container py-5">
       <div class="row justify-content-center border border-dark" style="background: rgba(11,15,18,0.6); ">
           <h2 class="col-12 mt-4 mb-2 pb-4 pt-3 text-center text-white " style="line-height: 65px;">Link Repair & Request Game</h2>
           @isset($finish)
           <h5 id="finish" class="col-12 text-danger shadow-lg font-weight-bold text-center pb-4" style="line-height: 30px">{{ $finish }}</h5>
           @endisset
           <div class="col-12 col-md-8">
               <form class="text-light pb-5" action="{{ route('requestGame.storeRequest') }}" method="post" enctype="multipart/form-data">
                   @csrf
                   <div class="form-group">
                       <label for="app_name">Game Name</label>
                       <input required type="text" class="form-control" name="app_name" id="app_name" placeholder="Game Name" >
                       @error('app_name')
                       <small class="invalid-feedback font-weight-bold" role="alert">
                           {{ $message }}
                       </small>
                       @enderror
                   </div>
                   <div class="form-group">
                       <label for="username">Your Name</label>
                       <input required type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{old('username')}}" placeholder="Your Name">
                       @error('username')
                       <small class="invalid-feedback font-weight-bold" role="alert">
                           {{ $message }}
                       </small>
                       @enderror
                   </div>
                   <div class="form-group">
                       <label for="phone">Phone or Email</label>
                       <input required type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{old('phone')}}" placeholder="Phone Number or Email">
                       @error('phone')
                       <small class="invalid-feedback font-weight-bold" role="alert">
                           {{ $message }}
                       </small>
                       @enderror
                   </div>
                   <div class="form-group">
                       <label for="description">Game Review & Online? Offline?</label>
                       <textarea required name="description" id="description" class="form-control @error('description') is-invalid @enderror" name="description" id=""  rows="7">{{old('description')}}</textarea>
                       @error('description')
                       <small class="invalid-feedback font-weight-bold" role="alert">
                           {{ $message }}
                       </small>
                       @enderror
                   </div>
                   <div class="form-group">
                       <label for="playstore_link">Game Playstore Link or Post link</label>
                       <input required type="text" class="form-control @error('playstore_link') is-invalid @enderror" name="playstore_link" id="playstore_link" value="{{old('playstore_link')}}" placeholder="Game Link">
                       @error('playstore_link')
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
            $('#finish').fadeOut(7500);
        });
    </script>
@endsection



