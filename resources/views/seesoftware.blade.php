@extends('dashboard.game_ui')
@section('meta_gtitle'){{ $software->name }} mgmm @endsection
@section('meta_gkeywords'){{ $software->name }} mgmm @endsection
@section('meta_gdescription'){{ $software->name }} mgmm @endsection
@section('meta_title')MGMM {{ $software->name }} @endsection
@section('meta_description')MGMM {{ $software->name }} @endsection
@section('og_image')https:://modgamesmm.com/storage/slogo/{{$software->logo}}@endsection
@section('twt_image')https:://modgamesmm.com/storage/slogo/{{$software->logo}}@endsection
@section('meta_icon')https:://modgamesmm.com/storage/slogo/{{$software->logo}}@endsection
@section('lg_logo')https:://modgamesmm.com/storage/slogo/{{$software->logo}}@endsection
@section('title')MGMM {{ $software->name }} @endsection

@section('content')
    <div class="container  px-0 my-2" style="background:rgba(11,15,18,0.6);">

        <div class="col-12 pt-2 d-flex flex-wrap align-items-center" style="background: rgba(11,15,18,0.6); ">

            <form class="text-white w-100 mx-2 my-4" action="{{ route('software.softwareSearch') }}" method="get"
                enctype="multipart/form-data">
                @csrf
                <div class="form-row align-items-end justify-content-center">
                    <div class="form-group col-md-5">
                        <label for="name" class="h5 mb-3">Search Softwares</label>
                        <input required type="text" class="form-control rounded-0 @error('name') is-invalid @enderror"
                            name="name" id="name" value="{{ old('name') }}"
                            placeholder="နာမည်အစစာလုံးကိုသာရေးပါ">
                    </div>
                    <div class="form-group col-md-2 text-left">
                        <button type="submit" class="btn rounded-0  btn-primary px-3 pb-2"> Search</button>
                    </div>
                </div>
            </form>

            <h3 class="col-12 mt-4 mb-2 text-center text-white font-weight-bold ">{{ $software->name }} </h3>

            <div class="star text-center col-12 h4 my-2" data-toggle="modal" data-target="#exampleModal{{ $software->id }}">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= floor(collect($software->rating)->avg()))
                        <i class="fas fa-star fa-fw"></i>
                    @else
                        <i class="far fa-star fa-fw"></i>
                    @endif
                @endfor
            </div>
            <div class="d-flex col-12  flex-wrap px-1 justify-content-around ">
                <div class="col-3 col-xs-12 col-md-2 px-1 my-3 border pt-1 border-danger bg-light"
                    style="border: 2px solid; color: rgb(6 28 116);">
                    <img src="{{ asset('/storage/slogo/' . $software->logo) }}" style="width: 100%;  margin-bottom: 5px;"
                        alt="">
                    {{--                                Rating Modal start                            --}}
                    <div class="modal fade" id="exampleModal{{ $software->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModal{{ $software->id }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content text-center" style="background-color: #a81d1d !important;">
                                <div class="modal-header">
                                    <h5 class="modal-title text-white" id="exampleModal{{ $software->id }}Label">How much
                                        do you like {{ $software->name }} ...</h5>
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
                                            <input type="hidden" value="{{ $software->id }}" name="post_id">
                                        </div>
                                        <input type="hidden" value="{{ $software->id }}" name="wedding_package_id">
                                        <button type="submit" class="btn text-white px-3 py-2 "
                                            style="background-color: #080c0d;"><i class="fas fa-plus-square mr-1"></i>
                                            Rating</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                                Rating Modal end                            --}}

                </div>
                <div class="col-9 col-md-10 my-3 px-1 pl-lg-5 pb-3 pt-1 border bg-light"
                    style="border: 2px solid; color: rgb(6 28 116);">
                    <div class="d-flex flex-wrap justify-content-center align-items-center">
                        <div class="col-6 px-0 col-md-4 col-lg-4">
                            <b class="font-weight-bolder" style="line-height: 41px">Company</b>
                            <p>{{ $software->developer }}</p>
                        </div>
                        <div class="col-6 px-0 col-md-4 col-lg-4">
                            <b class="font-weight-bolder" style="line-height: 41px">Last Updated</b>
                            <p>{{ $software->updated }}</p>
                        </div>
                        <div class="col-6 px-0 col-md-4 col-lg-4">
                            <b class="font-weight-bolder" style="line-height: 41px">Size</b>
                            <p>{{ $software->size }}</p>
                        </div>
                        <div class="col-6 px-0 col-md-4 col-lg-4">
                            <b class="font-weight-bolder" style="line-height: 41px">Version</b>
                            <p>{{ $software->version }}</p>
                        </div>
                        <div class="col-6 px-0 col-md-4 col-lg-4">
                            <b class="font-weight-bolder" style="line-height: 41px">Requirement</b>
                            <p>{{ $software->requirement }}</p>
                        </div>
                        <div class="col-6 px-0 col-md-4 col-lg-4">
                            <b class="font-weight-bolder" style="line-height: 41px">Type</b>
                            <p>{{ $software->type }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap g_img text-light px-0">
                <h3 class="col-12 my-4 font-weight-bolder text-center">Software Photos</h3>

                <div class="col-12 px-0 px-md-2 bg-light">
                    <div class="all_photo">
                        @foreach ($software->getPhoto as $photo)
                            <div class="px-lg-1 px-md-1 px-0">
                                <a class="venobox" data-gall="myGallery"
                                    href="{{ asset('/storage/software/' . $photo->name) }}">
                                    <img class="w-100" src="{{ asset('/storage/software/' . $photo->name) }}"
                                        alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 pt-2  text-center bg-light" style="color:#080c0d; line-height:2;">
                    <h3 class="col-12 font-weight-bolder my-3 text-center ">About Software</h3>
                    <p class="">{!! $software->description !!}</p>
                    <h6 class="py-1  col-10 col-md-6 my-1 mx-auto border border-success btn-outline-info badge-pill ">
                        Upload By {{ $software->getUser->name }}</h6>
                </div>
                <div class="col-12 text-primary text-center pb-3 px-0 my-0">
                    <div class="col-12 px-0 bg-light">
                        <h5 class="col-12  font-weight-bolder text-center pt-2">Mod Features</h5>
                        <!-- {{--                        <h4 class="col-12 font-weight-bolder text-center my-4">Everyting Unlimited</h4> --}} -->
                        <p class="" style=" line-height: 29px;">{!! $software->features !!}</p>
                        <h5 class="col-12  font-weight-bolder text-center py-3">Download Here</h5>
                        <div class="col-12  p-0 d-flex flex-wrap py-3 justify-content-center">
                            <a href="{{ route('software.download', $software->slug) }}"
                                class="btn btn-primary px-4 rounded-0 py-2">Download</a>
                        </div>

                    </div>
                </div>
                <div class="col-12 bg-light">

                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7297781591471758"
                        crossorigin="anonymous"></script>
                    <!-- view2 -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7297781591471758"
                        data-ad-slot="3938968097" data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
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
