@extends('dashboard.game_ui')
@section('meta_gtitle')
    {{ $software->name }} mgmm
@endsection
@section('meta_gkeywords')
    {{ $software->name }} mgmm
@endsection
@section('meta_gdescription')
    {{ $software->name }} mgmm
@endsection
@section('meta_title')
    MGMM {{ $software->name }}
@endsection
@section('meta_description')
    MGMM {{ $software->name }}
@endsection
@foreach ($software->getPhoto as $photo)
    @section('og_image')
        {{ asset('storage/software/' . $photo->name) }}
    @endsection
@break
@endforeach
{{-- @section('og_image'){{ asset('storage/slogo/' .$software->logo)}}@endsection --}}
@section('twt_image')
{{ asset('storage/slogo/' . $software->logo) }}
@endsection
@section('meta_icon')
{{ asset('storage/slogo/' . $software->logo) }}
@endsection
@section('lg_logo')
{{ asset('storage/slogo/' . $software->logo) }}
@endsection
@section('title')
MGMM {{ $software->name }}
@endsection

@section('content')
<div class="container  px-0 my-2 bg-light">

    <div class="col-12 pt-2 d-flex flex-wrap align-items-center bg-light">

        <form class="text-white w-100 mx-1 mt-2 mb-0" action="{{ route('software.softwareSearch') }}" method="get"
            enctype="multipart/form-data">
            @csrf
            <div class="form-row align-items-end justify-content-center">
                <div class="form-group col-10 col-md-5 pr-0">
                    {{-- <label for="name" class="h5 mb-3 text-dark">Search Games</label> --}}
                    <input required type="text" class="form-control rounded-0 @error('name') is-invalid @enderror"
                        name="name" id="name" value="{{ old('name') }}" placeholder="Software ရှာရန်... ">
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
                <img src="{{ asset('/storage/slogo/' . $software->logo) }}" style="width: 100%;  margin-bottom: 5px;"
                    alt="">
            </div>
            <div class="col-9 col-md-12 px-0">
                <h5 class="col-12 mt-4 mb-2 text-center text-md-start  font-weight-bold ">{{ $software->name }} </h5>

                <div class="star text-center col-12 h5 my-2" data-toggle="modal"
                    data-target="#exampleModal{{ $software->id }}">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $software->rating)
                            <i class="fas fa-star fa-fw"></i>
                        @else
                            <i class="far fa-star fa-fw"></i>
                        @endif
                    @endfor
                </div>
            </div>

        </div>
        <div class="col-12 px-0 mt-2">
            <table class="table table-bordered mx-0 px-0 w-100 table-striped">
                <tbody>
                    <tr>
                        <td><i class="text-primary feather-cpu"></i> Company</td>
                        <td>{{ $software->developer }}</td>
                    </tr>
                    <tr>
                        <td><i class="text-primary feather-calendar"></i> Updated</td>
                        <td>{{ $software->updated }}</td>
                    </tr>
                    <tr>
                        <td><i class="text-primary feather-save"></i> Size</td>
                        <td>{{ $software->size }}</td>
                    </tr>
                    <tr>
                        <td><i class="text-primary feather-layers"></i> Version</td>
                        <td>{{ $software->version }}</td>
                    </tr>
                    <tr>
                        <td><i class="text-primary feather-settings"></i> Requierment</td>
                        <td> {{ $software->requirement }}</td>
                    </tr>
                    <tr>
                        <td><i class="text-primary feather-package"></i> Type</td>
                        <td> {{ $software->type }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-12 d-flex flex-wrap g_img  px-0">
            <h4 class="col-12 my-4 font-weight-bolder text-center">Software Photos</h4>

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
                <h4 class="col-12 font-weight-bolder my-3 text-center ">About Software</h4>
                <p class="">{!! $software->description !!}</p>

            </div>
            <div class="col-12 text-primary text-center pb-3 px-0 my-0">
                <div class="col-12 px-0 bg-light">
                    <h5 class="col-12  font-weight-bolder text-center pt-2">Mod Features</h5>
                    <!-- {{--                        <h4 class="col-12 font-weight-bolder text-center my-4">Everyting Unlimited</h4> --}} -->
                    <p class="" style=" line-height: 29px;">{!! $software->features !!}</p>
                    <h5 class="col-12  font-weight-bolder text-center py-3">Download Here</h5>
                    <div class="col-12  p-0 d-flex flex-wrap pb-3 justify-content-center">
                        <a href="{{ route('software.download', $software->slug) }}"
                            class="btn btn-primary px-4 rounded-0 py-2">Download</a>
                    </div>
                    <h6 class="py-2  col-10 col-md-6 my-1 mx-auto border border-success btn-outline-info badge-pill ">
                        Upload By {{ $software->getUser->name }}</h6>
                </div>
            </div>




        </div>
    </div>
</div>
@endsection
@section('foot')
<script>
    $(document).ready(function() {
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
