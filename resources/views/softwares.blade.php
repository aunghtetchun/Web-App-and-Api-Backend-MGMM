
@extends('dashboard.game_ui')

@section("title") Mod Softwares Myanmar @endsection

@section('content')
    <div class="container"  >
        <div class="col-12 p-0 d-flex flex-wrap align-items-stretch">
            <div class="col-12 px-0 d-flex flex-wrap justify-content-around align-items-center" style="height: 10vh; overflow:hidden;">
                <form class="text-white w-100 mt-2 mb-0" action="{{ route('software.softwareSearch') }}" method="get" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row align-items-end justify-content-center">
                        <div class="form-group col-10 mb-2 col-md-5 pr-0">
                            {{-- <label for="name" class="h5 mb-3 text-dark">Search Games</label> --}}
                            <input required type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="software ရှာရန် ">
                        </div>
                        <div class="form-group col-2 mb-2 col-md-2 text-left  px-0">
                            <button type="submit" class="btn rounded-0 w-100 btn-primary px-3"> <i class="feather-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
           
            <h5 class="col-12 mb-3 py-3 text-center text-white border border-dark" style="background:rgb(35 41 220) ">{{ $title }}</h5>
            @if(count($softwares))
            <div class="col-12 d-flex px-0 flex-wrap">
            @foreach($softwares as $post)
                <div class="col-12 px-1 px-md-2 px-lg-3 col-md-6 col-lg-4 my-2">
                    <div class="col-12 rounded p-0 bg-light d-flex flex-wrap align-items-center software_card "  style="cursor: pointer; border-radius:0.5rem!important;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset; ">
                    
                        <!-- <div class="col-3 px-0 pt-0 rounded" style="height:90px; border-radius:0.5rem!important; overflow:hidden; background-image: url({{ asset("/storage/logo/".$post->logo) }})">

                        </div> -->
                        <div class="col-3 pl-2 pr-2 py-2 rounded">
                            <img class="p-0  px-0 pt-0 cropped" src="{{ asset("/storage/slogo/".$post->logo) }}" alt="Card image cap" onclick="location.href='{{route('software.singleSoftwareList',$post->slug)}}'" style="border-radius:0.5rem!important; ">
                        </div>

                        <!-- <img class="col-4 rounded p-0  px-0 pt-0" src="" alt="Card image cap" onclick="location.href='{{route('software.singleSoftwareList',$post->slug)}}'" style="width: 100%; border-radius:0.8rem!important; "> -->
                        <div class="col-9 p-0 pr-1 text-center card-body pt-1 " onclick="location.href='{{route('software.singleSoftwareList',$post->slug)}}'" style="padding: 13px">
                            <p class="card-title w-100 mb-0" style="font-size: 14px; color:black; overflow:hidden; height:20px;">{{ $post->name }}</p>
                            <div class="star" style="color:#ffe100 !important;">
                                @for($i=1; $i<=5; $i++)
                                    @if($i<=floor(collect($post->rating)->avg()) )
                                        <i class="fas fa-star fa-fw"></i>
                                    @else
                                        <i class="far fa-star fa-fw"></i>
                                    @endif
                                @endfor
                            </div>
                         
                            <h6 class="text-center m-0 p-0  badge badge-success px-2 py-1" style="position:absolute; min-width:55px; top: 30%; right:0; font-size: 12px"><i class="feather-eye"></i> &nbsp; {{ $post->count }}</h6>
                            <p class="text-mutedd mb-0" style="font-size: 11px;"> Mod : {{ $post->features }} </p>
                            <p class="card-text text-muted mb-2 " style="font-size: 12px;">{{ $post->size }}</p>

                        </div>
                       
                   
                  
                    </div>
                </div>
            @endforeach
            </div>
           

            <div class="col-12 px-0 d-flex justify-content-start">
                {!! $softwares->links() !!}
            </div>
           
            @else
            <div class="col-12 my-5 text-center px-0 py-3 text-dark" style="background: whitesmoke;">
                <p class="px-lg-5" style="line-height: 30px; font-size: 4vw" >!! ရှာမတွေ့ပါ နာမည်အစစာလုံးကိုသာရေး၍ရှာပေးပါ... ဥပမာ Subway Surfer အစား Subw ဒါမှမဟုတ် Subway ဒါမှမဟုတ် Surfer လို့ရေးရှာပေးပါ.... <a href="{{route('software.softwareList')}}" class="badge px-4 badge-pill badge-primary">Back</a></p>
                <hr/>
                <img src="{{asset('dashboard/images/nothing.png')}}" class="w-100 p-3" alt="">
            </div>
            @endif
        </div>
    </div>



@endsection
@section('foot')

@endsection




