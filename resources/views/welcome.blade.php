
@extends('dashboard.game_ui')

@section("title") Mod Games Myanmar @endsection


@section('content')
    <div class="container" >
        <div class="col-12 p-0 pt-2 d-flex flex-wrap align-items-center">
            <div class="col-12 py-3 px-1 text-center mr-auto text-white border border-dark" style="background: rgb(35 41 220);">
                <!-- <p class="my-4 " style="font-size: 35px; line-height: 50px">
                    Welcome From Mod Games Myanmar
                </p> -->
                {{-- <h4 style="line-height: 35px">( You Can Download All Mod Games Here )</h4> --}}
                <h5 class="mt-1 font-weight-bold px-0" style="line-height: 39px">ကြော်ငြာနှင့် Website အပ်လိုပါက </h5>
                <h5 class=" mb-1 px-0"> <a href="tel:09971404793" style="text-decoration: none; color:white; "> <i class="feather-phone-outgoing"></i> 09971404793</a>  ကိုဆက်သွယ်ပါ</h5>
                <p class="mt-2 mb-0 px-0" >( <span class="text-danger"> X </span>လောင်းကစားကြော်ငြာများလက်မခံပါ <span class="text-danger"> X </span> )</p>
            </div>
            <h5 class="col-12 my-3 text-center py-3 text-white border font-weight-bold border-dark" style="background: rgb(35 41 220)">လူကြိုက်အများဆုံးဂိမ်းများ </h5>

            <form class="text-white w-100 mx-1 mt-2 mb-0" action="{{ route('game.gameSearch') }}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="form-row align-items-end justify-content-center">
                    <div class="form-group col-10 col-md-5 pr-0">
                        {{-- <label for="name" class="h5 mb-3 text-dark">Search Games</label> --}}
                        <input required type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="ဂိမ်းရှာရန်... ">
                    </div>
                    <div class="form-group col-2 col-md-2 text-left  px-0">
                        <button type="submit" class="btn rounded-0  btn-primary w-100 px-3"> <i class="feather-search"></i></button>
                    </div>
                </div>
            </form>
        
            @foreach($posts as $post)
                <div class="col-12 px-1 px-md-2 px-lg-3 col-md-6 col-lg-4 my-2">
                    <div class="col-12 rounded p-0 bg-light d-flex flex-wrap align-items-center game_card "  style="cursor: pointer; border-radius:0.5rem!important;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset; ">
                    
                        <!-- <div class="col-3 px-0 pt-0 rounded" style="height:90px; border-radius:0.5rem!important; overflow:hidden; background-image: url()">

                        </div> -->
                        <div class="col-3 pl-2 pr-2 py-2 rounded">
                            <img class="p-0  px-0 pt-0 cropped" src="{{ asset("/storage/logo/".$post->logo) }}" alt="Card image cap" onclick="location.href='{{route('game.singleGameList',$post->slug)}}'" style="border-radius:0.5rem!important; ">
                        </div>
                        <div class="col-9 p-0 pr-1 text-center card-body pt-1 " onclick="location.href='{{route('game.singleGameList',$post->slug)}}'" style="padding: 13px">
                            <p class="card-title w-100 mb-0 " style="font-size: 14px; color:black; overflow:hidden; height:20px;">{{ $post->name }}</p>
                            <div class="star" style="color:#ffe100 !important;">
                                @for($i=1; $i<=5; $i++)
                                    @if($i<=$post->rating )
                                        <i class="fas fa-star fa-fw"></i>
                                    @else
                                        <i class="far fa-star fa-fw"></i>
                                    @endif
                                @endfor
                            </div>
                         
                            <h6 class="text-center m-0 p-0 list_badge badge badge-success px-2 py-1" style="top: 30%;"><i class="feather-eye "></i>  {{ $post->count }}</h6>
                            @if($post->new==1)
                            <h6 class="text-center m-0 p-0 list_badge badge badge-danger px-1 py-1" style="top: 55%;"><i class="feather-arrow-up-circle"></i>  update</h6>
                            @elseif($post->new==2)
                            <h6 class="text-center m-0 p-0 list_badge badge badge-primary px-1 py-1" style="top: 55%;"><i class="feather-gift"></i> new</h6>
                            @endif
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
            <h5 class="col-12 my-3 text-center py-3 text-white border font-weight-bold border-dark" style="background: rgb(35 41 220)">Popular Software </h5>
<!-- rgb(0 255 152) 1px 0px 72px -7px -->
<form class="text-white w-100 mx-1 mt-2 mb-0" action="{{ route('software.softwareSearch') }}" method="get" enctype="multipart/form-data">
    @csrf
    <div class="form-row align-items-end justify-content-center">
        <div class="form-group col-10 col-md-5 pr-0">
            {{-- <label for="name" class="h5 mb-3 text-dark">Search Games</label> --}}
            <input required type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="software ရှာရန်... ">
        </div>
        <div class="form-group col-2 col-md-2 text-left  pl-0">
            <button type="submit" class="btn rounded-0  btn-primary px-3"> <i class="feather-search"></i></button>
        </div>
    </div>
</form>
@foreach(App\Software::latest()->limit(12)->inRandomOrder()->get() as $post)
    <div class="col-12 px-1 px-md-2 px-lg-3 col-md-6 col-lg-4 my-2">
        <div class="col-12 rounded p-0 bg-light d-flex flex-wrap align-items-center game_card "  style="cursor: pointer; border-radius:0.5rem!important;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset; ">
        
            <!-- <div class="col-3 px-0 pt-0 rounded" style="height:90px; border-radius:0.5rem!important; overflow:hidden; background-image: url()">

            </div> -->
            <div class="col-3 pl-2 pr-2 py-2 rounded">
                <img class="p-0  px-0 pt-0 cropped" src="{{ asset("/storage/slogo/".$post->logo) }}" alt="Card image cap" onclick="location.href='{{route('software.singleSoftwareList',$post->slug)}}'" style="border-radius:0.5rem!important; ">
            </div>
            <div class="col-9 p-0 pr-1 text-center card-body pt-1 " onclick="location.href='{{route('software.singleSoftwareList',$post->slug)}}'" style="padding: 13px">
                <p class="card-title w-100 mb-0 " style="font-size: 14px; color:black; overflow:hidden; height:20px;">{{ $post->name }}</p>
                <div class="star" style="color:#ffe100 !important;">
                    @for($i=1; $i<=5; $i++)
                        @if($i<=$post->rating  )
                            <i class="fas fa-star fa-fw"></i>
                        @else
                            <i class="far fa-star fa-fw"></i>
                        @endif
                    @endfor
                </div>
             
               
                <h6 class="text-center m-0 p-0  badge badge-success px-1 py-1" style="position:absolute; min-width:55px; top: 30%; right:0; font-size: 12px"><i class="feather-eye"></i> &nbsp; {{ $post->count }}</h6>               
                {{-- @if(Carbon\Carbon::now()->subDays(7)->toDateString()<=$post->updated_at)
                <h6 class="text-center m-0 p-0  badge badge-danger px-1 py-1" style="position:absolute; min-width:55px; top: 40%; right:0; font-size: 12px"><i class="feather-eye"></i> &nbsp; update</h6>
                @endif --}}
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




