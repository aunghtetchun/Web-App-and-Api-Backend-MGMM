@extends('dashboard.game_ui')

@section('title')
    Mod Games Myanmar
@endsection

@section('content')
    <div class="container " >
        <div class="col-12 p-0 d-flex flex-wrap align-items-stretch">
            <div class="col-12 px-0 d-flex flex-wrap justify-content-around align-items-center" style="height: 10vh; overflow:hidden;">
                <form class="text-white w-100 mx-0 px-0 mt-2 mb-0" action="{{ route('game.gameSearch') }}" method="get"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row align-items-end justify-content-center">
                        <div class="form-group mb-2 col-10 col-md-5 pr-0">
                            {{-- <label for="name" class="h5 mb-3 text-dark">Search Games</label> --}}
                            <input required type="text"
                                class="form-control rounded-0 @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ old('name') }}" placeholder="ဂိမ်းရှာရန်... ">
                        </div>
                        <div class="form-group col-2 mb-2 col-md-2 text-left  px-0">
                            <button type="submit" class="btn rounded-0 w-100 btn-primary px-3"> <i
                                    class="feather-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            <h5 class="col-12 mb-2 py-2 text-center text-white border border-dark" style="background: rgb(35 41 220); ">
                {{ $title }}</h5>
            @if (count($games))
                <div class="d-flex col-12 px-0 flex-wrap " id="dataContainer">
                    @foreach ($games as $post)
                        <div class="col-12 px-1 px-md-2 px-lg-3 col-md-6 col-lg-4 my-2">
                            <div class="col-12 rounded p-0 bg-light d-flex flex-wrap align-items-center game_card "
                                style="cursor: pointer; border-radius:0.5rem!important;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset; ">

                                <div class="col-3 pl-2 pr-2 py-2 rounded">
                                    <img class="p-0  px-0 pt-0 cropped" src="{{ asset('/storage/logo/' . $post->logo) }}"
                                        alt="Card image cap"
                                        onclick="location.href='{{ route('game.singleGameList', $post->slug) }}'"
                                        style="border-radius:0.5rem!important; ">
                                </div>

                                <div class="col-9 p-0 pr-1 text-center card-body pt-1 "
                                    onclick="location.href='{{ route('game.singleGameList', $post->slug) }}'"
                                    style="padding: 13px">
                                    <p class="card-title w-100 mb-0"
                                        style="font-size: 14px; color:black; overflow:hidden; height:20px;">
                                        {{ $post->name }}</p>
                                    <div class="star" style="color:#ffe100 !important;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $post->rating)
                                                <i class="fas fa-star fa-fw"></i>
                                            @else
                                                <i class="far fa-star fa-fw"></i>
                                            @endif
                                        @endfor
                                    </div>

                                    <h6 class="text-center m-0 p-0 list_badge badge badge-success px-2 py-1"
                                        style="top: 30%;"><i class="feather-eye"></i> {{ $post->count }}</h6>
                                    @if ($post->new == 1)
                                        <h6 class="text-center m-0 p-0 list_badge badge badge-danger px-1 py-1"
                                            style="top: 55%;"><i class="feather-arrow-up-circle"></i> update</h6>
                                    @elseif($post->new == 2)
                                        <h6 class="text-center m-0 p-0 list_badge badge badge-primary px-1 py-1"
                                            style="top: 55%;"><i class="feather-gift"></i> new</h6>
                                    @endif
                                    <p class="text-mutedd mb-0" style="font-size: 11px;"> Version : {{ $post->version }}
                                    </p>
                                    <p class="card-text text-muted mb-2 " style="font-size: 12px;">{{ $post->size }}</p>

                                </div>



                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center col-12 loading">
                    <div class="spinner-border" role="status">
                      <span class="sr-only">Loading...</span>
                    </div>
                  </div>


                {{-- <div class="col-12 d-flex justify-content-start px-0">

                    {!! $games->links() !!}
                </div> --}}
            @else
                <div class="col-12 my-5 text-center px-0 py-3 text-dark" style="background: whitesmoke;">
                    <h5 class="px-lg-5" style="line-height: 30px;">!! ရှာမတွေ့ပါ နာမည်အစစာလုံးကိုသာရေး၍ရှာပေးပါ... </h5>
                    <h5 class="px-lg-5" style="line-height: 30px;">
                        ဥပမာ Subway Surfer အစား Subw ဒါမှမဟုတ် Subway ဒါမှမဟုတ် Surfer လို့ရေးရှာပေးပါ.... <a
                            href="{{ route('game.gameList') }}" class="badge px-4 badge-pill badge-primary">Back</a></h5>
                    <hr />
                    <img src="{{ asset('dashboard/images/nothing.png') }}" class="w-100 p-3" alt="">
                </div>
            @endif
        </div>
    </div>



@endsection
@section('foot')
    <script>
        var page = 2;

        // function scrollHandler() {
        //     // Check if the user has scrolled to the bottom
        //     if (window.innerHeight + window.scrollY + 20 >= document.body.offsetHeight) {
        //         // Display an alert
        //         // alert("Hey");

        //     }
        // }
        // Function to be called when the element becomes visible
        var oldUrl='';
        function handleElementVisibility(entries, observer) {
            var nextPageUrl = "{{ $games->nextPageUrl() }}";
            if(oldUrl==''){
                oldUrl=nextPageUrl;
            }

            // let originalUrl = "http://modgamesmm.com/game?page=2";
            let modifiedUrl = oldUrl.replace("http://modgamesmm.com/game", "https://modgamesmm.com/api/v1/game");
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Call your function here
                    $.ajax({
                        url: modifiedUrl,
                        type: 'GET',
                        // data: {
                        //     "page": page
                        // },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response.message);
                            let games = response.games;
                            // console.log(games);
                            if(games.next_page_url!=null){
                                oldUrl=games.next_page_url.replace("http://", "https://")
                                console.log(oldUrl);
                            }else{
                                oldUrl="no more";
                                $(".loading").addClass("d-none");
                            }
                            

                            games.data.forEach(function(item) {

                                var htmlContent = `    <div class="col-12 px-1 px-md-2 px-lg-3 col-md-6 col-lg-4 my-2">
                                <div class="col-12 rounded p-0 bg-light d-flex flex-wrap align-items-center game_card"
                                    style="cursor: pointer; border-radius:0.5rem!important;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">
                                    <div class="col-3 pl-2 pr-2 py-2 rounded">
                                        <img class="p-0  px-0 pt-0 cropped" src="https://modgamesmm.com/storage/logo/${item.logo}"
                                            alt="Card image cap" onclick="window.open('https://modgamesmm.com/games/${item.slug}','_blank')"
                                            style="border-radius:0.5rem!important;">
                                    </div>
                                    <div class="col-9 p-0 pr-1 text-center card-body pt-1"
                                        onclick="window.open('https://modgamesmm.com/games/${item.slug}','_blank')" style="padding: 13px">
                                        <p class="card-title w-100 mb-0"
                                            style="font-size: 14px; color:black; overflow:hidden; height:20px;">
                                            ${item.name}</p>
                                        <div class="star" style="color:#ffe100 !important;">
                                            ${generateStars(item.rating)}
                                        </div>
                                        <h6 class="text-center m-0 p-0 list_badge badge badge-success px-2 py-1"
                                            style="top: 30%;"><i class="feather-eye"></i> ${item.count}</h6>
                                        ${generateBadges(item.new)}
                                        <p class="text-mutedd mb-0" style="font-size: 11px;"> Version : ${item.version}</p>
                                        <p class="card-text text-muted mb-2" style="font-size: 12px;">${item.size}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                                $("#dataContainer").append(htmlContent);
                            });
                            page++;
                        },
                        error: function(xhr) {
                $(".loading").addClass("d-none");

                            console.log('AJAX request failed');
                        }
                    });

                    // Stop observing once the element is visible
                    //   observer.unobserve(entry.target);
                }
            });
        }
        // Select the element by its ID
        const targetElement = document.getElementById('yourElementId');

        // Create a new Intersection Observer
        const observer = new IntersectionObserver(handleElementVisibility);

        // Start observing the target element
        observer.observe(targetElement);


        // Function to generate star icons based on rating value
        function generateStars(rating) {
            var starsHtml = '';
            for (var i = 1; i <= 5; i++) {
                if (i <= Math.floor(rating)) {
                    starsHtml += '<i class="fas fa-star fa-fw"></i>';
                } else {
                    starsHtml += '<i class="far fa-star fa-fw"></i>';
                }
            }
            return starsHtml;
        }

        // Function to generate badges based on new value
        function generateBadges(newValue) {
            var badgeHtml = '';
            if (newValue == 1) {
                badgeHtml =
                    '<h6 class="text-center m-0 p-0 list_badge badge badge-danger px-1 py-1" style="top: 55%;"><i class="feather-arrow-up-circle"></i> update</h6>';
            } else if (newValue == 2) {
                badgeHtml =
                    '<h6 class="text-center m-0 p-0 list_badge badge badge-primary px-1 py-1" style="top: 55%;"><i class="feather-gift"></i> new</h6>';
            }
            return badgeHtml;
        }
    </script>
@endsection
