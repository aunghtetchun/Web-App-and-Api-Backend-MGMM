@extends('dashboard.game_ui')

@section('meta_title')
    Mod Games MM {{ $game->name }}
@endsection

@section('meta_description')
@endsection
@section('meta_image')
    {{ asset('/storage/logo/' . $game->logo) }}
@endsection
@section('title')
    Mod Games Myanmar Download
@endsection
@section('head')
    <style>
        /* .eighteen{
                                                            display:none;
                                                        } */
        .nbar {
            display: none;
        }

        .collapse>.card-body {
            line-height: 1.7 !important;
            /* font-size: 17px !important; */

        }

        .btn-link {
            list-style: none !important;
            list-style-type: none !important;
            text-decoration: none !important;
        }

        /* #finish{
                                                            display:none;
                                                        }

                                                        #dscroll{
                                                            overflow:hidden;
                                                            height: 100%;
                                                        } */
    </style>
@endsection
@section('content')
    <div class="container  px-0 my-2 " style=" min-height:100vh;">

        <div class="col-12 pt-2 d-flex flex-wrap align-items-center">

            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ $game->name }} </h5>
                        <hr>
                        {{-- <p class="card-text">MGMM website အား ဖုန်း Apk အဖြစ်အသုံးပြုနိုင်ပါပြီရှင်...</p> --}}
                        <div
                            class="col-12 px-0 d-flex flex-wrap justify-content-center text-center text-dark align-items-center">
                            <!-- <div class="col-12 text-center font-weight-bold text-dark h4">
                                                                                            <span id="countdown" style="line-height: 40px">Please Wait 10 စက္ကန့်</span>
                                                                                        </div> -->

                            @if (isset($game->link1))
                                <div class="col-12 px-0 px-md-2 col-md-4 dllink" id="download_link1">
                                    @if (str_contains($game->link1, 'modyolo'))
                                        <a href="{{ $game->link1 }}" class="btn btn-block py-2 btn-primary mb-2">
                                            <i class="feather-arrow-down"></i>
                                            {{ $game->name_1 }}
                                        </a>
                                    @elseif (isset($game->keywords))
                                        <a href="{{ route('download', [$game->slug, 'link1', 'game']) }}"
                                            class="btn btn-block py-2 btn-primary mb-2">
                                            <i class="feather-arrow-down"></i>
                                            {{ $game->name_1 }}
                                        </a>
                                    @else
                                        <a href="{{ route('download', [$game->slug, 'link1', 'software']) }}"
                                            class="btn btn-block py-2 btn-primary mb-2">
                                            <i class="feather-arrow-down"></i>
                                            {{ $game->name_1 }}
                                        </a>
                                    @endif

                                </div>
                            @endif

                            <!--{{ $game }}-->
                            @if (isset($game->link2))
                                <div class="col-12 px-0 px-md-2 col-md-4 dllink" id="download_link2">
                                    @if (str_contains($game->link2, 'modyolo'))
                                        <a href="{{ $game->link2 }}" class="btn btn-block py-2 btn-primary mb-2">
                                            <i class="feather-arrow-down"></i>
                                            {{ $game->name_2 }}
                                        </a>
                                    @elseif (isset($game->keywords))
                                        <a href="{{ route('download', [$game->slug, 'link2', 'game']) }}"
                                            class="btn btn-block py-2 btn-primary mb-2">
                                            <i class="feather-arrow-down"></i>
                                            {{ $game->name_2 }}
                                        </a>
                                    @else
                                        <a href="{{ route('download', [$game->slug, 'link2', 'software']) }}"
                                            class="btn btn-block py-2 btn-primary mb-2">
                                            <i class="feather-arrow-down"></i>
                                            {{ $game->name_2 }}
                                    @endif
                                </div>
                            @endif
                            @if (isset($game->link3))
                                <div class="col-12 px-0 px-md-2 col-md-4 dllink" id="download_link3">
                                    @if (str_contains($game->link3, 'modyolo'))
                                        <a href="{{ $game->link3 }}" class="btn btn-block py-2 btn-primary mb-2">
                                            <i class="feather-arrow-down"></i>
                                            {{ $game->name_3 }}
                                        </a>
                                    @elseif (isset($game->keywords))
                                        <a href="{{ route('download', [$game->slug, 'link3', 'game']) }}"
                                            class="btn btn-block py-2 btn-primary mb-2">
                                            <i class="feather-arrow-down"></i>
                                            {{ $game->name_3 }}
                                        </a>
                                    @else
                                        <a href="{{ route('download', [$game->slug, 'link3', 'software']) }}"
                                            class="btn btn-block py-2 btn-primary mb-2">
                                            <i class="feather-arrow-down"></i>
                                            {{ $game->name_3 }}
                                    @endif
                                </div>
                            @endif
                            <div class="col-12 px-0 px-md-2 col-md-4 dllink" id="download_link3">
                                <form id="report" class=" mt-2 pb-2" action="{{ route('reportBrokenLink') }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $game->id }}" name="post_id">
                                    @if (isset($game->keywords))
                                        <input type="hidden" value="game" name="post_type">
                                    @else
                                        <input type="hidden" value="software" name="post_type">
                                    @endif

                                </form>
                                @if (session('finish'))
                                    <div class="alert bg-success text-white font-weight-bold" id="message"
                                        style="position: fixed; top:2%; left: 50%; line-height: 28px;
                                        transform: translate(-50%, -4%); z-index:3000; width: 350px;">
                                        {{ session('finish') }}
                                    </div>
                                @else
                                    <button type="submit" form="report" onclick="showElement()"
                                        class="btn btn-block py-2 btn-outline-danger mb-2">
                                        <i class="feather-link"></i>
                                        လင့်ပြင်ပေးခိုင်းရန်နှိပ်ပါ
                                    </button>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="card-footer font-weight-bolder text-info text-center">
                        {{ $game->count }} ယောက် </span> ဒေါင်းထားပါတယ်
                    </div>
                </div>
                <div class="card shadow mt-3 border border-success">
                    <div class="card-body text-center">
                        <h4 class="text-blue mb-2">Vpn မခံဘဲဒေါင်းရင်ပိုမြန်ပါတယ် </h4>
                        <h4 class="text-blue"> Vpn ခံသုံးဖို့မလိုပါ</h4>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="accordion" id="accordionExample">
                    <h5 class="text-center py-2 border border-dark mt-3 mb-0">အမေးများဆုံးမေးခွန်းများ</h5>
                    <div class="card" style="border-top: 0;">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-danger px-0" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="feather-help-circle"></i> တစ်ချို့ဂိမ်းတွေက ဆော့မရဘူး ?
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse " aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body h6">
                                မိမိဒေါင်းလိုက်တဲ့ဂိမ်းဆော့မရခြင်းနဲ့ပက်သက်ပြီး ဖြစ်နိုင်တဲ့အချက်များက <br>
                                ၁။ ဂိမ်းObb ဒါမှမဟုတ် Data ဖိုင်ထည့်တာမှားတာ မျိုးဆို ဝင်ပီးရင် ဆော့မရဘဲ ဖြစ်တတ်ပါတယ်...
                                <br>
                                &nbsp; &nbsp;( အထဲရောက်ပီးမှ ဖိုင်မရှိကြောင်းပြပီး ဘာမှဆက်မဖြစ်လာတာမျိုးဆို နံပါတ် ၁
                                အချက်ကြောင့်ဖြစ်ပါတယ်) <br>
                                ၂။ မိမိဒေါင်းလိုက်တဲ့ဂိမ်းက ထွက်ထားတာအရမ်းကြာနေပြီမို့ ဖုန်းနဲ့မကိုက်တော့တာကြောင့်လည်း
                                ဆော့မရဖြစ်တတ်ပါတယ်... <br>
                                ၃။ ဖုန်းကအမျိုးအစားနိမ့်နေပြီး ဂိမ်းက ဖုန်းအမြင့်လိုအပ်တဲ့ဂိမ်းဖြစ်နေရင်လည်း
                                ဆော့မရဖြစ်တတ်ပါတယ်... <br>
                                &nbsp; &nbsp;( ဝင်လိုက်တာနဲ့ ဘာမှမပြဘဲ တန်းထွက်သွားတာမျိုးဆို နံပါတ် ၂ နဲ့ ၃
                                အချက်ကြောင့်ဖြစ်ပါတယ်) <br>
                                ၄။ ခိုးပီးသားဂိမ်းတော်တော်များများက ဆော့နေတဲ့အချိန် ဂိမ်းထဲဝင်တဲ့အချိန်မှာ အင်တာနက်
                                လုံးဝဖွင့်ထားလို့မရပါဘူး ဖွင့်မိလို့ mod err တက်ပြီးဆော့မရတာမျိုးလည်းဖြစ်နိုင်ပါတယ်... <br>
                                ၆။ ဂိမ်းက Update ထွက်လာလို့ update တင်ခိုင်းနေပီး
                                မတင်တာကြောင့်ဆော့မရတာမျိုးလည်းဖြစ်တတ်ပါတယ်... <br>
                                &nbsp; &nbsp;(အဲလိုမျိုးဆို comment ရေးခဲ့ပီး update request လုပ်နိုင်ပါတယ်...) <br>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-danger px-0 collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    <i class="feather-download"></i> ဂိမ်းဒေါင်းတာ အဆင်မပြေဘူး ?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body h6">
                                ဂိမ်းဒေါင်းတာ ဒေါင်းမရတာဖြစ်စေနိုင်တဲ့အချက်များမှာ <br>
                                ၁။ ဂိမ်း download link ကသေနေလို့ ဝင်ဒေါင်းတဲ့အခါ ဘာမှမပြဘဲ ဖြစ်နေတာဖြစ်နိုင်ပါတယ်... <br>
                                &nbsp; &nbsp;(အဲလိုမျိုးဆို မရတဲ့ဂိမ်းအောက်မှာ comment ရေးထားခဲ့ယုံပါဘဲ)<br>
                                ၂။ Google Drive လင့်ဖြစ်နေလို့ဒေါင်းမရတာမျိုးဖြစ်နိုင်ပါတယ်...facebook
                                ကနေလင့်တွေဝင်ဒေါင်းတဲ့အခါ မိမိဖုန်း browser ကိုမရောက်ဘဲ facebook browser မှာဘဲဖြစ်နေလို့
                                ဒေါင်းမရတာမျိုးကြောင့်ပါ<br>
                                &nbsp; &nbsp;( Open in browser ကနေဖြစ်ဖြစ် ဂိမ်းလင့်ကို ကော်ပီကူးပီးဖြစ်ဖြစ် ဖုန်း browser
                                ကနေပီးဒေါင်းလို့ရပါတယ်)<br>
                                ၃။ ကြော်ငြာလင့်တွေမကျော်တတ်တာကြောင့်လည်းဖြစ်နိုင်ပါတယ်<br>
                                &nbsp; &nbsp;( တစ်ချို့လင့်တွေက ကြော်ညာခံထားတဲ့လင့်တွေဖြစ်တတ်တဲ့အတွက် ဂိမ်းတင်တဲ့သူကို
                                ဒေါင်းနည်းသွားမေးနိုင်ပါတယ်...)<br>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-danger px-0 collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    <i class="feather-upload"></i> ဂိမ်းတွေ ဒီထဲမှာ လာတင်လို့ရလား ?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
                            <div class="card-body h6">
                                ဂိမ်းတွေ ဒီထဲမှာလာတင်ဖို့အတွက်ဆို Admin - Aung Htet Chon အကောင့်ကို လာပြောလို့ရပါတယ်... <br>
                                ပုံမှန်ဂိမ်းတင်နိုင်တယ် ပေ့တွေ ဂရုတွေမှာလည်း ပြန်တင်နိုင်တယ် ဆို အမြဲ ကြိုဆိုပါတယ်... <br>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-danger px-0 collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    <i class="feather-share-2"></i> ဂိမ်းတွေ အပြင်မှာပြန်ယူတင်လို့ရလား ?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-parent="#accordionExample">
                            <div class="card-body h6">
                                ပြန်ယူတင်လို့ ရပါတယ်... ဒီထဲက ဘယ်ဂိမ်းကိုမဆို မိမိကြိုက်တဲ့နေရာမှာပြန်ယူတင်လို့ရပါတယ်...
                                <br>
                                ပြန်ယူတင်တဲ့အခါ Download Link ကို website လင့်ထည့်ပေးဖို့တော့လိုပါမယ်...<br>
                                Link ဥပမာ - modgamesmm.com/games/ဂိမ်းနာမည် <br>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-body d-flex flex-wrap justify-content-around align-items-center">
                        <h5 class="card-title col-12 px-0">MGMM Apk ဒေါင်းရန်</h5>
                        <hr>
                        <p class="card-text col-12 px-0">MGMM website အား ဖုန်း Apk အဖြစ်အသုံးပြုနိုင်ပါပြီရှင်...</p>
                        <!-- <div class="col-12 col-md-4 px-1"> -->
                        <!-- <a href="https://mega.nz/file/WNxVkZKI#rr5EzefzcUwurQvc14m6ow2wUQss18W9bo5iv7UnFOQ"
                                class="btn col-12 px-0 mb-2 btn-outline-primary">Download apk (mega)</a> -->
                                <!-- <a href="https://mega.nz/file/WNxVkZKI#rr5EzefzcUwurQvc14m6ow2wUQss18W9bo5iv7UnFOQ"
                                class="btn col-12 px-0 mb-2 btn-outline-primary">Download apk (mega)</a>
                        </div> -->
                        <div class="col-12 col-md-4 px-1">
                            <a href="https://www.mediafire.com/file/so1l5prv67z650p/MGMM_Update.apk/file?fbclid=IwAR1n7k4_klLiV79XN1lBmksr1csrHiHcNsuj70klqc6zjC_kQrBd0jSxOJc"
                                class="btn col-12 px-0 btn-outline-primary mb-2">Download apk (mediafire)</a>
                        </div>
                        <div class="col-12 col-md-4 px-1">
                            <a href="https://drive.google.com/u/0/uc?id=19fh7MLXwkhnU0eYJDb3u7cQQQxgUK8bf&export=download&fbclid=IwAR3DxwndpZCz9YOEzjszo5UvpKF2c6jzCakp-E6k42SD6XSMgRgl_rw0exo"
                                class="btn col-12 px-0 mb-2 btn-outline-primary">Download apk (gdrive)</a>
                        </div>
                    </div>
                </div>
            </div>

            @if (isset($game->category_id))
                <div class="col-12 d-flex flex-wrap justify-content-center px-0 mt-0">
                    <div class="responsive col-12 col-lg-9 px-0 mt-0 d-flex flex-wrap justify-content-center pb-3">
                        <h3 class="col-12 font-weight-bolder  text-center my-3">Similar Games</h3>
                        @foreach (App\Category::find($game->category_id)->posts()->inRandomOrder()->limit(8)->get() as $similar)
                            <div class="card shadow game_card px-1 col-3 col-lg col-md rounded-0"
                                onclick="location.href='{{ route('game.singleGameList', $similar->slug) }}'"
                                style="cursor: pointer;">
                                <img class="card-img-top" src="{{ asset('/storage/logo/' . $similar->logo) }}"
                                    alt="Card image cap"
                                    style="width: 100%; border-radius:13px; max-height: 85px; padding: 2px;">
                                <div class="card-body pt-1 pb-2" style="padding: 13px">
                                    <p class="card-title w-100 "
                                        style="font-size: 14px; color:black; overflow:hidden; height:39px;">
                                        {{ $similar->name }}</p>

                                </div>
                            </div>
                        @endforeach
                    </div>
            @endif
        </div>



    </div>
    </div>



@endsection
@section('foot')
    <script>
        $(document).ready(function() {
            $('#message').fadeIn();
            // Hide the message div after 3 seconds
            setTimeout(function() {
                $('#message').fadeOut();
            }, 3000);
        });
    </script>
@endsection
