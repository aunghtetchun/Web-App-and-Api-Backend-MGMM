
@extends('dashboard.game_ui')

@section("title") Mod Games Myanmar @endsection

@section('content')
    <div class="container py-4"  >
        <div class="col-12 p-0 d-flex flex-wrap align-items-stretch">
            <div class="col-12 d-flex flex-wrap justify-content-around align-items-center" style="height: 20vh">
                <form class="text-white w-100" action="{{ route('game.gameSearch') }}" method="get" enctype="multipart/form-data">
                    @csrf
                    <!-- <h1 class="col-12 text-center mb-5 shadow-lg" style="font-size: 44px; line-height: 44px">ကြိုဆိုပါတယ် မင်္ဂလာပါ</h1> -->
                    <div class="form-row align-items-end justify-content-center">
                        <div class="form-group col-md-5">
                            <label for="name" class="h5 mb-3 text-dark font-weight-bold">Search Games</label>
                            <input required type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="ဂိမ်းနာမည်အစစာလုံးကိုသာရေးပါ">
                        </div>
                        <div class="form-group col-md-2 text-left">
                            <button type="submit" class="btn rounded-0  btn-primary px-3 pb-2"> Search</button>
                        </div>
                    </div>
                </form>
            </div>
           
            <h3 class="col-12 my-3 pb-4 pt-3 text-center text-white border border-dark" style="background: rgba(11,15,18,0.6); ">{{ $title }}</h3>
            @if(count($games))
            <div class="d-flex col-12 px-0 flex-wrap">
            @foreach($games as $post)
                <div class="col-12 px-1 px-md-3 px-lg-3 col-md-4 col-lg-4 my-3">
                    <div class="col-12 rounded p-0 bg-light d-flex flex-wrap align-items-center game_card "  style="cursor: pointer; border-radius:0.5rem!important;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset; ">
                    
                        <!-- <div class="col-3 px-0 pt-0 rounded" style="height:90px; border-radius:0.5rem!important; overflow:hidden; background-image: url({{ asset("/storage/logo/".$post->logo) }})">

                        </div> -->
                        <img class="col-3 rounded p-0  px-0 pt-0 cropped" src="{{ asset("/storage/logo/".$post->logo) }}" alt="Card image cap" onclick="location.href='{{route('game.singleGameList',$post->slug)}}'" style="border-radius:0.5rem!important; ">

                        <!-- <img class="col-4 rounded p-0  px-0 pt-0" src="" alt="Card image cap" onclick="location.href='{{route('game.singleGameList',$post->slug)}}'" style="width: 100%; border-radius:0.8rem!important; "> -->
                        <div class="col-9 p-0 text-center card-body pt-1 " onclick="location.href='{{route('game.singleGameList',$post->slug)}}'" style="padding: 13px">
                            <p class="card-title w-100 mb-0" style="font-size: 14px; color:black; overflow:hidden; height:20px;">{{ $post->name }}</p>
                            <div class="star" style="color:#ffe100 !important;">
                                @for($i=1; $i<=5; $i++)
                                    @if($i<=floor(collect($post->getRating->pluck('rating'))->avg()) )
                                        <i class="fas fa-star fa-fw"></i>
                                    @else
                                        <i class="far fa-star fa-fw"></i>
                                    @endif
                                @endfor
                            </div>
                         
                            <h6 class="text-center m-0 p-0  badge badge-success px-2 py-1" style="position:absolute; min-width:55px; top: 40%; right:0; font-size: 12px"><i class="feather-eye"></i> &nbsp; {{ $post->count }}</h6>
                            <p class="text-mutedd mb-0" style="font-size: 11px;"> Version : {{ $post->version }} </p>
                            <p class="card-text text-muted mb-2 " style="font-size: 12px;">{{ $post->size }}</p>

                        </div>
                       
                   
                  
                    </div>
                </div>
            @endforeach
            </div>
           

            <div class="col-12 d-flex justify-content-start">

                {!! $games->links() !!}
            </div>
           
            @else
            <div class="col-12 my-5 text-center px-0 py-3 text-dark" style="background: whitesmoke;">
                <p class="px-lg-5" style="line-height: 6vw; font-size: 4vw" >!! Opp There is nothing game here.... <a href="{{route('game.gameList')}}" class="badge px-4 badge-pill badge-primary">Back</a></p>
                <hr/>
                <img src="{{asset('dashboard/images/nothing.png')}}" class="w-100 p-3" alt="">
            </div>
            @endif
        </div>
    </div>



@endsection
@section('foot')

@endsection




