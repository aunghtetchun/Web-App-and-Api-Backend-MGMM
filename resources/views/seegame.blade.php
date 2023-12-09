@extends('dashboard.game_ui')

@section('meta_gtitle')
    {{ $game->name }} mgmm
@endsection

@section('meta_gdescription')
    {{ $game->name }} mgmm
@endsection
@section('meta_gkeywords')
    {{ $game->name }} mgmm
@endsection
@section('meta_title')
    MGMM {{ $game->name }} mgmm
@endsection

@section('meta_description')
    MGMM {{ $game->name }} mgmm
@endsection

{{-- @section('og_image'){{ asset('storage/logo/' . $game->logo) }}@endsection --}}
@foreach ($game->getPhoto as $photo)
    @section('og_image')
        {{ isset($game->crawl_url)?$photo->name : asset('storage/post/' . $photo->name) }}
    @endsection
@break
@endforeach
@section('twt_image')
{{ isset($game->crawl_url)?$game->logo : asset('storage/logo/' . $game->logo) }}
@endsection
@section('meta_icon')
{{ isset($game->crawl_url)?$game->logo : asset('storage/logo/' . $game->logo) }}
@endsection
@section('lg_logo')
{{ isset($game->crawl_url)?$game->logo : asset('storage/logo/' . $game->logo) }}
@endsection
@section('title')
MGMM {{ $game->name }}
@endsection

@section('content')
<div class="container  px-0 my-2" style="background:rgba(11,15,18,0.6);">

            <!-- Button trigger modal -->
        <button type="button" id="showmodal" class="btn d-none btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MGMM စျေးဆိုင်ပါဝင်တဲ့ MGMM Apk Update ထွက်လာပါပြီရှင်...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body d-flex flex-wrap justify-content-around align-items-center">
                        <h5 class="col-12 px-0 my-3">MGMM Apk နောက်ဆုံးဗားရှင်းဒေါင်းရန်</h5>
                        <hr>
                        <!-- <div class="col-12 col-md-4 px-1"> -->
                        <!-- <a href="https://mega.nz/file/WNxVkZKI#rr5EzefzcUwurQvc14m6ow2wUQss18W9bo5iv7UnFOQ"
                                class="btn col-12 px-0 mb-2 btn-outline-primary">Download apk (mega)</a> -->
                                <!-- <a href="https://mega.nz/file/WNxVkZKI#rr5EzefzcUwurQvc14m6ow2wUQss18W9bo5iv7UnFOQ"
                                class="btn col-12 px-0 mb-2 btn-outline-primary">Download apk (mega)</a>
                        </div> -->
                        <div class="col-6 px-1">
                            <a href="https://www.mediafire.com/file/so1l5prv67z650p/MGMM_Update.apk/file?fbclid=IwAR1n7k4_klLiV79XN1lBmksr1csrHiHcNsuj70klqc6zjC_kQrBd0jSxOJc"
                                class="btn col-12 px-0 py-2 btn-outline-primary mb-2">Download apk (Mediafire)</a>
                        </div>
                        <div class="col-6 px-1">
                            <a href="https://drive.google.com/u/0/uc?id=19fh7MLXwkhnU0eYJDb3u7cQQQxgUK8bf&export=download&fbclid=IwAR3DxwndpZCz9YOEzjszo5UvpKF2c6jzCakp-E6k42SD6XSMgRgl_rw0exo"
                                class="btn col-12 py-2 px-0 mb-2 btn-outline-primary">Download apk (Google Drive)</a>
                        </div>
                        <h5 class=" col-12 px-0 my-3">MGMM ၁၈+ သီးသန့်တင်တဲ့ Apk ဒေါင်းရန်</h5>
                        <hr>
                        <!-- <div class="col-12 col-md-4 px-1"> -->
                        <!-- <a href="https://mega.nz/file/WNxVkZKI#rr5EzefzcUwurQvc14m6ow2wUQss18W9bo5iv7UnFOQ"
                                class="btn col-12 px-0 mb-2 btn-outline-primary">Download apk (mega)</a> -->
                                <!-- <a href="https://mega.nz/file/WNxVkZKI#rr5EzefzcUwurQvc14m6ow2wUQss18W9bo5iv7UnFOQ"
                                class="btn col-12 px-0 mb-2 btn-outline-primary">Download apk (mega)</a>
                        </div> -->
                        <div class="col-12 px-1">
                            <a href="https://drive.google.com/file/d/1lnbYDsayeOHF-enrlqSKSHhcHA_PRDOs/view?fbclid=IwAR0T17w0zTjTzp9sY8NZ4des56BWhVcPQFRvlBKz7l2chk83-RsXd6rco74"
                                class="btn col-12 py-2 px-0 mb-2 btn-outline-success">Download 18+ apk (Google Drive)</a>
                        </div>
                        <div class="col-12 px-1">
                            <a href="https://www.facebook.com/100064025654123/posts/pfbid0jpLKWf3X1N17zFQQxvUc8vsfpmenvGknpTtGUR52fq6VB4FmSsBLeubrHygYbxJsl/?mibextid=Nif5oz"
                                class="btn col-12 py-2 px-0 mb-2 btn-warning">Google Drive လင့်ဒေါင်းနည်း</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary px-3" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    <div class="col-12 pt-2 d-flex bg-light flex-wrap align-items-center" style="background: rgba(11,15,18,0.6); ">

        <form class="text-white w-100 mx-1 mt-2 mb-0" action="{{ route('game.gameSearch') }}" method="get"
            enctype="multipart/form-data">
            @csrf
            <div class="form-row align-items-end justify-content-center">
                <div class="form-group col-10 col-md-5 pr-0">
                    {{-- <label for="name" class="h5 mb-3 text-dark">Search Games</label> --}}
                    <input required type="text" class="form-control rounded-0 @error('name') is-invalid @enderror"
                        name="name" id="name" value="{{ old('name') }}" placeholder="ဂိမ်းရှာရန်... ">
                </div>
                <div class="form-group col-2 col-md-2 text-left  pl-0" onclick="showElement()">
                    <button type="submit" class="btn rounded-0  btn-primary px-3"> <i
                            class="feather-search"></i></button>
                </div>
            </div>
        </form>
        <div class="d-flex col-12 flex-wrap align-items-start justify-content-center">
            <div class="col-3 col-md-2 col-xs-12 col-md-2 px-1 my-3 border pt-1 border-danger bg-light"
                style="border: 2px solid; color: rgb(6 28 116); ">
                <img src="{{isset($game->crawl_url)?$game->logo :  asset('/storage/logo/' . $game->logo) }}" style="width: 100%;  margin-bottom: 5px;"
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
                                <button type="submit" class="btn  px-3 py-2 " style="background-color: #080c0d;"><i
                                        class="fas fa-plus-square mr-1"></i>
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
                                href="{{ isset($game->crawl_url)?$photo->name : asset('/storage/post/' . $photo->name) }}">
                                <img class="w-100" src="{{isset($game->crawl_url)?$photo->name :  asset('/storage/post/' . $photo->name) }}"
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
                <div class="col-12 px-0 pb-1 bg-light">
                    <h4 class="col-12  font-weight-bolder text-center pt-3" style="color: black;">Mod Features</h4>
                    <p class="px-3" style=" line-height: 29px;">{!! $game->features !!}</p>
                    <h4 class="col-12  font-weight-bolder text-center pt-3" style="color: black;">Download Here</h4>
                    <div class="col-12  px-0 d-flex flex-wrap pt-3 pb-4 justify-content-center">
                        <a href="{{ route('game.download', $game->slug) }}"
                            class="btn btn-primary px-4 rounded-0 py-2"><i class="feather-arrow-down"></i>
                            ဒီမှာဒေါင်းပါ </a>
                        <div class="col-12 mt-3 text-center">
                        </div>
                        <h6
                            class="py-1  col-9 col-md-6 my-1  mx-auto border border-success btn-outline-info badge-pill ">
                            Upload By {{ $game->getUser->name }}</h6>
                        <div class="col-12 px-0 mt-2 text-center d-flex flex-wrap">
                            <div class="col-6 pl-0 pr-1">
                                <a class="btn col-12 text-light" style="background: rgb(60, 60, 187)"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                                    target="_blank"> <i class="feather-facebook"></i> Share on Facebook</a>
                            </div>
                            <div class="col-6 pl-1 pr-0">
                                <a href="https://t.me/+skU4FVRG3_ZkYzE1"
                                    class="btn px-0 col-12  telegram-button">
                                    <i class="fab p-1 fa-telegram" style="font-size:17px"></i> Join Telegram
                                </a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <div class="col-12 px-0 text-center">
                <h4 class="col-12 font-weight-bolder  text-center mb-1">Comment</h4>
                <ul class="list-group text-left col-12 p-0">
                    @foreach (\App\Comment::where('post_id', $game->id)->latest()->limit(5)->get() as $cmt)
                        <li class="list-group-item text-light w-100 mb-1"
                            style="background-color: rgba(196,57,57,0.8) !important;">{{ $cmt->comment }}</li>
                    @endforeach
                </ul>
                <form class=" mt-2 pb-2" action="{{ route('commentGame.storeComment') }}" method="post">
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
                <div
                    class="responsive col-12 px-0 col-lg-9 pb-3 d-flex flex-wrap align-items-center justify-content-center">
                    @foreach (App\Category::find($game->category_id)->posts()->inRandomOrder()->limit(8)->get() as $similar)
                        <div class="card col-3 col-lg col-md game_card px-1 rounded-0"
                            onclick="location.href='{{ route('game.singleGameList', $similar->slug) }}'"
                            style="cursor: pointer; min-height: 141px;">
                            <img class="card-img-top" src="{{isset($similar->crawl_url)?$similar->logo :  asset('/storage/logo/' . $similar->logo) }}"
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
        $("#showmodal").click();
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
</script>
@endsection
