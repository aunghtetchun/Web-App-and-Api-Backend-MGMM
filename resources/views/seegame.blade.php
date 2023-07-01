@extends('dashboard.game_ui')

@section('meta_gtitle'){{ $game->name }} mgmm @endsection

@section('meta_gdescription'){{ $game->name }} mgmm @endsection
@section('meta_gkeywords'){{ $game->name }} mgmm @endsection
@section('meta_title')MGMM {{ $game->name }} mgmm @endsection

@section('meta_description')MGMM {{ $game->name }} mgmm @endsection

{{-- @section('og_image'){{ asset('storage/logo/' . $game->logo) }}@endsection --}}
@foreach($game->getPhoto as $photo)
@section('og_image'){{ asset('storage/post/' . $photo->name) }}@endsection
@break
@endforeach
@section('twt_image'){{ asset('storage/logo/' . $game->logo) }}@endsection
@section('meta_icon'){{ asset('storage/logo/' . $game->logo) }}@endsection
@section('lg_logo'){{ asset('storage/logo/' . $game->logo) }}@endsection
@section('title')MGMM {{ $game->name }}@endsection

@section('content')
    <div class="container  px-0 my-2" style="background:rgba(11,15,18,0.6);">

        <div class="col-12 pt-2 d-flex bg-light flex-wrap align-items-center" style="background: rgba(11,15,18,0.6); ">

            <form class="text-white w-100 mx-1 mt-2 mb-0" action="{{ route('game.gameSearch') }}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="form-row align-items-end justify-content-center">
                    <div class="form-group col-10 col-md-5 pr-0">
                        {{-- <label for="name" class="h5 mb-3 text-dark">Search Games</label> --}}
                        <input required type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="ဂိမ်းရှာရန်... ">
                    </div>
                    <div class="form-group col-2 col-md-2 text-left  pl-0">
                        <button type="submit" class="btn rounded-0  btn-primary px-3"> <i class="feather-search"></i></button>
                    </div>
                </div>
            </form>
            <div class="d-flex col-12 flex-wrap align-items-start justify-content-center">
                <div class="col-3 col-md-2 col-xs-12 col-md-2 px-1 my-3 border pt-1 border-danger bg-light"
                    style="border: 2px solid; color: rgb(6 28 116); ">
                    <img src="{{ asset('/storage/logo/' . $game->logo) }}" style="width: 100%;  margin-bottom: 5px;"
                        alt="">
                </div>
                <div class="col-9 col-md-12 px-0">
                    <h5 class="col-12 mt-4 mb-2 text-center text-md-start  font-weight-bold ">{{ $game->name }} </h5>

                    <div class="star text-center col-12 h5 my-2" data-toggle="modal"
                    data-target="#exampleModal{{ $game->id }}">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= floor(collect($game->rating)->avg()))
                            <i class="fas fa-star fa-fw"></i>
                        @else
                            <i class="far fa-star fa-fw"></i>
                        @endif
                    @endfor
                </div>
                </div>
                <h5 class="col-12 my-1 text-center">
                    {{-- <a class="py-0 font-weight-bold text-danger"
                        href="{{ route('game.gameListFilter', $game->getCategory->id) }}"
                        style="text-decoration: none; cursor: pointer">( {{ $game->getCategory->title }} )</a> --}}
                    <div class="col-12 px-0 text-center ">
                        @foreach (App\Post::find($game->id)->categories as $c)
                            <a href="{{ route('game.gameListFilter', $c->id) }}"
                                class="badge badge-danger badge-pill font-weight-bold  px-3 py-2 my-1 mx-1">
                                {{ $c->title }}
                            </a>
                        @endforeach
                    </div>
                </h5>
            </div>
            
         
            <div class="d-flex col-12  flex-wrap px-1 justify-content-around ">
                  {{--                                Rating Modal start                            --}}
                  <div class="modal fade" id="exampleModal{{ $game->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModal{{ $game->id }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content text-center" style="background-color: #a81d1d !important;">
                            <div class="modal-header">
                                <h5 class="modal-title " id="exampleModal{{ $game->id }}Label">How much
                                    do you like {{ $game->name }} ...</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-dark">x</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('addRating.storeRating') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <div class="rating">
                                            <label>
                                                <input type="radio" name="rating" value="1" />
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="rating" value="2" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="rating" value="3" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="rating" value="4" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="rating" value="5" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                        </div>
                                        @error('rating')
                                            <small class="invalid-feedback font-weight-bold" role="alert">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                        <input type="hidden" value="{{ $game->id }}" name="post_id">
                                    </div>
                                    <input type="hidden" value="{{ $game->id }}" name="wedding_package_id">
                                    <button type="submit" class="btn  px-3 py-2 "
                                        style="background-color: #080c0d;"><i class="fas fa-plus-square mr-1"></i>
                                        Rating</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                                Rating Modal end                            --}}
                <div class="col-12 px-0 mt-2">
                    <table class="table table-bordered mx-0 px-0 w-100 table-striped">
                        <tbody>
                          <tr>
                            <td><i class="text-primary feather-cpu"></i> Company</td>
                            <td>{{ $game->developer }}</td>
                          </tr>
                          <tr>
                            <td><i class="text-primary feather-calendar"></i> Updated</td>
                            <td>{{ $game->updated }}</td>
                          </tr>
                          <tr>
                            <td><i class="text-primary feather-save"></i> Size</td>
                            <td>{{ $game->size }}</td>
                          </tr>
                          <tr>
                            <td><i class="text-primary feather-layers"></i> Version</td>
                            <td>{{ $game->version }}</td>
                          </tr>
                          <tr>
                            <td><i class="text-primary feather-settings"></i> Requierment</td>
                            <td> {{ $game->requirement }}</td>
                          </tr>
                          <tr>
                            <td><i class="text-primary feather-package"></i> Type</td>
                            <td> {{ $game->type }}</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                {{-- <div class="col-12 my-3 px-2 pl-lg-5 pb-3 pt-1 border bg-light"
                    style="border: 2px solid; color: rgb(6 28 116);">
                    <div class="d-flex flex-wrap justify-content-center align-items-center">
                        <div class="col-6 px-0 col-md-4 col-lg-4">
                            <b class="font-weight-bolder" style="line-height: 41px">Company</b>
                            <p>{{ $game->developer }}</p>
                        </div>
                        <div class="col-6 px-0 col-md-4 col-lg-4">
                            <b class="font-weight-bolder" style="line-height: 41px">Last Updated</b>
                            <p>{{ $game->updated }}</p>
                        </div>
                        <div class="col-6 px-0 col-md-4 col-lg-4">
                            <b class="font-weight-bolder" style="line-height: 41px">Size</b>
                            <p>{{ $game->size }}</p>
                        </div>
                        <div class="col-6 px-0 col-md-4 col-lg-4">
                            <b class="font-weight-bolder" style="line-height: 41px">Version</b>
                            <p>{{ $game->version }}</p>
                        </div>
                        <div class="col-6 px-0 col-md-4 col-lg-4">
                            <b class="font-weight-bolder" style="line-height: 41px">Requirement</b>
                            <p>{{ $game->requirement }}</p>
                        </div>
                        <div class="col-6 px-0 col-md-4 col-lg-4">
                            <b class="font-weight-bolder" style="line-height: 41px">Type</b>
                            <p>{{ $game->type }}</p>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-12 d-flex flex-wrap g_img  px-0">
                <h4 class="col-12 my-4 font-weight-bolder text-center">Gameplay Photos</h4>

                <div class="col-12 px-0 bg-light px-md-2">
                    <div class="all_photo">
                        @foreach ($game->getPhoto as $photo)
                            <div class="px-lg-1 px-md-1 px-0">
                                <a class="venobox" data-gall="myGallery"
                                    href="{{ asset('/storage/post/' . $photo->name) }}">
                                    <img class="w-100" src="{{ asset('/storage/post/' . $photo->name) }}"
                                        alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 text-center px-0 px-md-2 px-lg-4">
                    <h4 class="col-12 font-weight-bolder my-4">Gameplay Video</h4>
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/{!! $game->video !!}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="col-12 pt-2  text-center bg-light" style="color:#080c0d; line-height:2;">
                    <h4 class="col-12 font-weight-bolder mt-3 pb-0 mb-0 text-center ">About Game</h4>
                    {{-- <ul class="nav px-0 d-flex bg-info justify-content-center col-12 nav-tabs" id="myTab"
                        role="tablist">
                        <li class="nav-item col-6 px-0">
                            <a class="nav-link active font-weight-bolder" id="home-tab" data-toggle="tab"
                                href="#home" role="tab" aria-controls="home" style="color:blue;"
                                aria-selected="true">English</a>
                        </li>
                        <li class="nav-item col-6 px-0">
                            <a class="nav-link font-weight-bolder" id="profile-tab" data-toggle="tab" href="#profile"
                                role="tab" aria-controls="profile" style="color:blue;"
                                aria-selected="false">မြန်မာလိုဖတ်ရန်</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-4 px-lg-5 pb-2" id="myTabContent" style="line-height: 29px;">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab"> --}}
                    {{-- <p class=""> {{ $game->name }}
                                is one of the most popular multiplayer online battle arena (MOBA) game in southeast Aisa.
                                {{ $game->name }} has a little bit of similarities to the popular MOBAs on PC League of
                                Legends but designed only for Android&iOS smartphones and tablets. Good graphic and easy to
                                control, different types of historical and mythical hero characters designed. Be sure you
                                will play this game with a good Wifi connection, just because network latency will help your
                                opponent kill your hero to death in game
                            </p>
                            <h6
                                class="py-1  col-10 col-md-6 my-1 mx-auto border border-success btn-outline-info badge-pill ">
                                Upload By {{ $game->getUser->name }}</h6> --}}
                    {{-- </div>
                        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab"> --}}
                    <p class="">{!! $game->description !!}</p>
                   
                    {{-- </div>
                    </div> --}}
                </div>

                <div class="col-12 text-primary text-center pb-1 px-0 my-0">
                    <div class="col-12 px-0 pb-4 bg-light">
                        <h4 class="col-12  font-weight-bolder text-center pt-3" style="color: black;">Mod Features</h4>
                        <p class="px-3" style=" line-height: 29px;">{!! $game->features !!}</p>
                        <h4 class="col-12  font-weight-bolder text-center pt-3" style="color: black;">Download Here</h4>
                        <div class="col-12  px-0 d-flex flex-wrap pt-3 pb-4 justify-content-center">
                            <a href="{{ route('download', $game->id) }}"
                                class="btn btn-primary px-4 rounded-0 py-2">Download Now</a>
                              
                                <h6 class="col-12 mt-2 warning_download">ဒေါင်းမရပါက မရသည့်ဂိမ်းအောက်တွင် ကွန်မန့် (comment) ချန်ထားခဲ့ပေးပါခင်ဗျာ...  </h6>
                        <h6 class="col-12 warning_download">ဘယ်ဂိမ်းတွေကမရလည်းသိမှ ပြန်ပြင်ပေးရတာမြန်တဲ့အတွက်ကြောင့်ပါ ခင်ဗျာ... </h6>
                        <div class="col-12 mt-3 text-center">
                            <a class="btn px-3 py-2 text-light" style="background: rgb(60, 60, 187)" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank"> <i class="feather-facebook"></i> Share on Facebook</a>
                        </div>
                        </div>
                        <h6 class="py-1  col-9 col-md-6 my-1  mx-auto border border-success btn-outline-info badge-pill ">
                            Upload By {{ $game->getUser->name }}</h6>
                    </div>
                    
                </div>
                <div class="col-12 px-0 text-center">
                    <h4 class="col-12 font-weight-bolder  text-center mt-4 mb-1">Comment</h4>
                    <ul class="list-group text-left col-12 p-0">
                        @foreach (\App\Comment::where('post_id', $game->id)->latest()->limit(5)->get() as $cmt)
                            <li class="list-group-item text-light w-100 mb-1"
                                style="background-color: rgba(196,57,57,0.8) !important;">{{ $cmt->comment }}</li>
                        @endforeach
                    </ul>
                    <form class=" mt-2 pb-2" action="{{ route('commentGame.storeComment') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $game->id }}" name="post_id">
                        <div class="form-group">
                            <textarea required name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror"
                                name="comment" id="" rows="2">{{ old('comment') }}</textarea>
                            @error('comment')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-block form-control text-light  py-2"
                            style="background-color: #a81d1d"><i class="fas fa-plus-square mr-1"></i> Comment</button>
                    </form>
                </div>

                <div class="col-12 d-flex flex-wrap justify-content-center px-0">
                    <h4 class="col-12 font-weight-bolder text-center my-3">Similar Games</h4>
                    <div class="responsive col-12 px-0 col-lg-9 pb-3 d-flex flex-wrap align-items-center justify-content-center">
                        @foreach (App\Category::find($game->category_id)->posts()->inRandomOrder()->limit(8)->get() as $similar)
                            <div class="card col-3 col-lg col-md game_card px-1 rounded-0"
                                onclick="location.href='{{ route('game.singleGameList', $similar->slug) }}'"
                                style="cursor: pointer; min-height: 141px;">
                                <img class="card-img-top" src="{{ asset('/storage/logo/' . $similar->logo) }}"
                                    alt="Card image cap"
                                    style="width: 100%; border-radius:13px; min-height: 76px;  max-height: 85px; padding: 2px;">
                                <div class="card-body pt-1 pb-2" style="padding: 13px">
                                    <p class="card-title w-100"
                                        style="font-size: 14px; color:black; overflow:hidden; height:39px;">
                                        {{ $similar->name }}</p>
                                    <!-- <p class="card-text text-muted " style="font-size: 12px; height:15px; overflow:hidden;">{{ $similar->developer }}</p> -->

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('foot')
    <script>
        $(document).ready(function() {
            $('.venobox').venobox({ // default: ''
                // frameheight: 100%,                            // default: ''
                bgcolor: '#5dff5e', // default: '#fff'
                titleattr: 'data-title', // default: 'title'
                numeratio: true, // default: false
                infinigall: true, // default: false
            });

        });


        // $('.responsive').slick({
        //     dots: true,
        //     infinite: true,
        //     speed: 300,
        //     arrows: false,
        //     slidesToShow: 5,
        //     slidesToScroll: 1,
        //     autoplay: true,
        //     autoplaySpeed: 1500,
        //     responsive: [
        //         {
        //             breakpoint: 1024,
        //             settings: {
        //                 slidesToShow: 4,
        //                 slidesToScroll: 1,
        //                 infinite: true,
        //                 dots: true
        //             }
        //         },
        //         {
        //             breakpoint: 600,
        //             settings: {
        //                 slidesToShow: 3,
        //                 slidesToScroll: 1
        //             }
        //         },
        //         {
        //             breakpoint: 480,
        //             settings: {
        //                 slidesToShow: 3,
        //                 slidesToScroll: 1
        //             }
        //         }
        //         // You can unslick at a given breakpoint now by adding:
        //         // settings: "unslick"
        //         // instead of a settings object
        //     ]
        // });

        $('.all_photo').slick({
            dots: true,
            infinite: true,
            speed: 400,
            arrows: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>
@endsection
