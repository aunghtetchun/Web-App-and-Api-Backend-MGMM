
@extends('dashboard.game_ui')

@section("title") Mod Games Myanmar @endsection


@section('content')
    <div class="container py-2" >
        <div class="col-12 p-0 pt-5 d-flex flex-wrap align-items-center">
            <div class="col-12 py-3 pt-lg-5 pt-md-5 pt-sm-3 my-lg-5 my-md-5 my-sm-0 text-center col-md-8 mr-auto text-white border border-dark" style="background: rgba(11,15,18,0.6)">
                <!-- <p class="my-4 " style="font-size: 35px; line-height: 50px">
                    Welcome From Mod Games Myanmar
                </p> -->
                <h4 style="line-height: 35px">( You Can Download All Mod Games Here )</h4>
                <h4 class="mt-3" style="line-height: 35px">ကြော်ငြာထည့်ရန် <a href="tel:09971404793" style="text-decoration: none; color:white;">09971404793</a>  ကိုဆက်သွယ်ပါ </h4>
            </div>
            <h3 class="col-12 my-3 text-center pb-4 pt-3 text-white border font-weight-bold border-dark" style="background: rgba(11,15,18,0.6);">Popular Games </h3>

            <form class="text-white w-100 mx-2 mt-2 mb-3" action="{{ route('game.gameSearch') }}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="form-row align-items-end justify-content-center">
                    <div class="form-group col-md-5">
                        <label for="name" class="h5 mb-3 text-dark">Search Games</label>
                        <input required type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="ဂိမ်းနာမည်အစစာလုံးကိုသာရေးပါ ">
                    </div>
                    <div class="form-group col-md-2 text-left">
                        <button type="submit" class="btn rounded-0  btn-primary px-3 pb-2"> Search</button>
                    </div>
                </div>
            </form>
        
            @foreach($posts as $post)
                <div class="col-12 px-1 px-md-3 px-lg-3 col-md-4 col-lg-4 my-3">
                    <div class="col-12 rounded p-0 bg-light d-flex flex-wrap align-items-center game_card "  style="cursor: pointer; border-radius:0.5rem!important;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset; ">
                    
                        <!-- <div class="col-3 px-0 pt-0 rounded" style="height:90px; border-radius:0.5rem!important; overflow:hidden; background-image: url()">

                        </div> -->
                        <img class="col-3 rounded p-0  px-0 pt-0 cropped" src="{{ asset("/storage/logo/".$post->logo) }}" alt="Card image cap" onclick="location.href='{{route('game.singleGameList',$post->slug)}}'" style="border-radius:0.5rem!important; ">
                        <div class="col-9 p-0 text-center card-body pt-1 " onclick="location.href='{{route('game.singleGameList',$post->slug)}}'" style="padding: 13px">
                            <p class="card-title w-100 mb-0 " style="font-size: 14px; color:black; overflow:hidden; height:20px;">{{ $post->name }}</p>
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
                        <!-- <div class="col-12 p-0 pt-2">
                        <img class="w-100 rounded" src="{{ asset("/storage/post/".$post->getPhoto[0]->name) }}" alt="" style="border-radius:0.8rem!important;">
                        
                    </div> -->
                 
                  
                    </div>
                </div>
            @endforeach
            <div class="col-12 text-center my-3">
                <a href="{{ route('game.gameList') }}" class="btn px-4  text-light font-weight-bold py-2 rounded-0" style="background-color: #a81d1d;"> See More <i class="feather-arrow-right"></i></a>
            </div>
            <h3 class="col-12 my-3 text-center pb-4 pt-3 text-white border font-weight-bold border-dark" style="background: rgba(11,15,18,0.6);">Popular Software </h3>
<!-- rgb(0 255 152) 1px 0px 72px -7px -->
@foreach(App\Software::latest()->limit(12)->inRandomOrder()->get() as $post)
    <div class="col-12 px-sm-2 px-md-3 px-lg-3 col-md-4 col-lg-4 my-3">
        <div class="col-12 rounded p-0 bg-light d-flex flex-wrap align-items-center game_card "  style="cursor: pointer; border-radius:0.5rem!important;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset; ">
        
            <!-- <div class="col-3 px-0 pt-0 rounded" style="height:90px; border-radius:0.5rem!important; overflow:hidden; background-image: url()">

            </div> -->
            <img class="col-3 rounded p-0  px-0 pt-0 cropped" src="{{ asset("/storage/slogo/".$post->logo) }}" alt="Card image cap" onclick="location.href='{{route('software.singleSoftwareList',$post->slug)}}'" style="border-radius:0.5rem!important; ">
            <div class="col-9 p-0 text-center card-body pt-1 " onclick="location.href='{{route('software.singleSoftwareList',$post->slug)}}'" style="padding: 13px">
                <p class="card-title w-100 mb-0 " style="font-size: 14px; color:black; overflow:hidden; height:20px;">{{ $post->name }}</p>
                <div class="star" style="color:#ffe100 !important;">
                    @for($i=1; $i<=5; $i++)
                        @if($i<=floor(collect($post->rating)->avg()) )
                            <i class="fas fa-star fa-fw"></i>
                        @else
                            <i class="far fa-star fa-fw"></i>
                        @endif
                    @endfor
                </div>
             
                <h6 class="text-center m-0 p-0  badge badge-success px-2 py-1" style="position:absolute; min-width:55px; top: 40%; right:0; font-size: 12px"><i class="feather-eye"></i> &nbsp; {{ $post->count }}</h6>
                <p class="text-mutedd mb-0" style="font-size: 11px;"> Mod : {{ $post->features }} </p>
                <p class="card-text text-muted mb-2 " style="font-size: 12px;">{{ $post->size }}</p>

            </div>
            <!-- <div class="col-12 p-0 pt-2">
            <img class="w-100 rounded" src="{{ asset("/storage/post/".$post->getPhoto[0]->name) }}" alt="" style="border-radius:0.8rem!important;">
            
        </div> -->
     
      
        </div>
    </div>
@endforeach
<div class="col-12 text-center mt-4">
    <a href="{{ route('software.softwareList') }}" class="btn px-4  text-light font-weight-bold py-2 rounded-0" style="background-color: #a81d1d;"> See More <i class="feather-arrow-right"></i></a>
</div>
            


        </div>
    </div>



@endsection




