
@extends('dashboard.game_ui')

@section('meta_title')
   Mod Games MM {{ $game->name }}
@endsection

@section(('meta_description'))
@endsection
@section('meta_image')
    {{ asset("/storage/logo/".$game->logo) }}
@endsection
@section("title") Mod Games Myanmar Download @endsection
@section("head")
<style>
    .eighteen{
        display:none;
    }
    .nbar{
        display:none;
    }
    #finish{
        display:none;
    }

    #dscroll{
        overflow:hidden;
        height: 100%;
    }

</style>
@endsection
@section('content')
    <div class="container  px-0 my-2 " style=" min-height:100vh;" >

        <div class="col-12 pt-2 d-flex flex-wrap align-items-center" >
        <!-- <h2 class="col-12 text-center my-2 font-weight-bolder">အောက်သို့ဆွဲပါ</h2> -->
        
            <div class="col-12 px-0" style="margin-top:59px;">
                <!-- Ads  -->
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7297781591471758"
                    crossorigin="anonymous"></script>
                <!-- one -->
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-7297781591471758"
                    data-ad-slot="8152162381"
                    data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <div class="col-12 text-center font-weight-bold text-light bg-success py-3 " style="position:fixed; top:0; left:0; z-index:3000; text-shadow: 0 0 3px #2C00FF, 0 0 5px #00F; font-size: 1.8rem;">
            <span id="countdown" style="line-height: 40px">Please Wait 7 စက္ကန့် to download</span>
        </div>
        
                    <!-- two -->
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7297781591471758"
                                crossorigin="anonymous"></script>
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-7297781591471758"
                    data-ad-slot="8236170288"
                    data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <!-- view_six -->
                   <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7297781591471758"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-7297781591471758"
     data-ad-slot="4070414741"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!-- view_seven -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7297781591471758"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-7297781591471758"
     data-ad-slot="3642506500"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7297781591471758"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="autorelaxed"
     data-ad-client="ca-pub-7297781591471758"
     data-ad-slot="5989991333"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script> -->
            </div>
            

                        <div class="col-12 p-0 d-flex flex-wrap pb-2 justify-content-center bg-light" >
            <h4 class="col-12 my-2 text-center font-weight-bold " >{{ $game->name }} </h4>           

                            <div class="col-12 col-md-10 d-flex flex-wrap justify-content-center text-center text-dark align-items-center">
                                 <!-- <div class="col-12 text-center font-weight-bold text-dark h4">
                                    <span id="countdown" style="line-height: 40px">Please Wait 10 စက္ကန့်</span>
                                </div> -->
                                 
                                @if(isset($game->link1))
                                <div class="col-12 col-md-4 dllink d-none" id="download_link1">
                                    <a href="{{ $game->link1 }}" target="_blank" class="btn btn-block py-2 btn-primary mb-2"><i class="feather-arrow-down"></i> {{ $game->name_1}}</a>
                                </div>
                                @endif
                                
                                <!--{{ $game }}-->
                                @if(isset($game->link2))
                                    <div class="col-12 col-md-4 dllink d-none" id="download_link2">
                                        <a href="{{ $game->link2 }}" target="_blank" class="btn btn-block py-2 btn-success mb-2"><i class="feather-arrow-down"></i> {{ $game->name_2}} </a>
                                    </div>
                             
                                @endif
                                @if(isset($game->link3))
                                    <div class="col-12 col-md-4 dllink d-none" id="download_link3">
                                        <a href="{{ $game->link3 }}" target="_blank" class="btn btn-block py-2 btn-success mb-2"><i class="feather-arrow-down"></i> {{ $game->name_3}}</a>
                                    </div>
                                @endif
                                
                            </div>
                        <div class="col-12 py-2 font-weight-bolder text-center"> <span class=" font-weight-bolder" style="font-size:18px">{{ $game->count }} Users </span>  download </div>

                        </div>

                        <div class="col-12 px-0">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7297781591471758"
                                crossorigin="anonymous"></script>
                            <!-- four -->
                            <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-client="ca-pub-7297781591471758"
                                data-ad-slot="6710555376"
                                data-ad-format="auto"
                                data-full-width-responsive="true"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    @if(isset($game->category_id))
                    <div class="col-12 px-0 mt-0" >
                        <div class="responsive mt-0 d-flex flex-wrap pb-3">
                        <h3 class="col-12 font-weight-bolder  text-center my-3">Similar Games</h3>
                            @foreach(App\Category::find($game->category_id)->posts()->inRandomOrder()->limit(8)->get() as $similar)
                                <div class="card game_card px-1 col-3 col-md-2 rounded-0" onclick="location.href='{{route('game.singleGameList',$similar->slug)}}'" style="cursor: pointer;">
                                    <img class="card-img-top" src="{{ asset("/storage/logo/".$similar->logo) }}" alt="Card image cap" style="width: 100%; border-radius:13px; max-height: 85px; padding: 2px;">
                                    <div class="card-body pt-1 pb-2" style="padding: 13px">
                                        <p class="card-title w-100 " style="font-size: 14px; color:black; overflow:hidden; height:39px;">{{ $similar->name }}</p>
                                        <!-- <p class="card-text text-muted " style="font-size: 12px; height:15px; overflow:hidden;">{{ $similar->developer }}</p> -->
                                
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif
                          <!-- two -->
                      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7297781591471758"
                                crossorigin="anonymous"></script>
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-7297781591471758"
                    data-ad-slot="8236170288"
                    data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                    </div>

                   
                    
        </div>
    </div>



@endsection
@section('foot')
    <script>
    $(document).ready(function(){
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
        var count = 7;

        (function(){
            timerCount();
        })();
        $(window).on('focus', function() {
//   console.log('Webpage is open');
count += 4;
  timerCount();
                      $('html, body').animate({ 
      scrollTop:0
    }, 500);
  // Perform actions when the webpage is in focus
});
        function timerCount(){
            var message = "%d seconds before download link appears";
            
            var countdown_element = document.getElementById("countdown");
           
            var dscroll = document.getElementById("dscroll");
            var thanks = document.getElementById("thanks");
            var finish = document.getElementById("finish");
            


// $(window).on('blur', function() {
//     count=7;
//     // alert(page);
//   console.log('Webpage is not open');
//   // Perform actions when the webpage is not in focus
// });
            var timer = setInterval(function(){
                if (count) {
                    dscroll.style.overflow="hidden";
                    $(".dllink").addClass("d-none");
                    countdown_element.innerHTML = "Please Wait %d စက္ကန့် to download".replace("%d", count);
                    count--;
                } else {
                    clearInterval(timer);
                    
                    dscroll.style.overflow="scroll";
                    $(".dllink").removeClass("d-none");
    countdown_element.innerHTML = "အောက်သို့ဆွဲပါ ";
                }
                
            }, 1000);
            
}
});




    </script>
@endsection



