@extends('dashboard.game_ui')

@section('title')
    Mod Games Myanmar
@endsection
@section('head')
    <style>
        .card-img-top {
            padding: 20px 3rem;
            width:250px;
        }
        p{
            margin-bottom: 8px;
        }
        
    </style>
@endsection
@section('content')
    <div class="container pt-5 px-2">
        <div class="row justify-content-center align-items-center">
            <h2 class="col-12 text-center mb-3 er">Our Team Members</h2> 
            <hr>
            <div class="col-10 col-md-5 col-lg-4 py-2 px-1">
                <div class="card shadow">
                    <img class="card-img-top mx-auto rounded-circle"
                        src="https://i.ibb.co/cbFhS00/1657476345941.jpg"
                        alt="Card image cap">
                    <div class="card-body pt-1 text-center">
                        <h5 class="card-title ">Aung Htet Chon</h5>
                        <p>Website & Web App Developer</p>
                        {{-- <p class="card-text">
                            Game Website & Web App Creator 
                        </p> --}}
                        <a href="https://www.facebook.com/aunghtetch0n" class="btn py-2 btn-outline-info"><i class="feather-facebook"></i></a>
                        <a href="tel:09971404793" class="btn py-2 btn-outline-primary"><i class="feather-phone"></i>
                            </a>
                            <a href="https://m.me/100069553492400" class="btn py-2 btn-outline-success"><i class="feather-message-circle"></i>
                            </a>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-5 col-lg-4 py-2 px-1">
                <div class="card shadow">
                    <img class="card-img-top mx-auto rounded-circle"
                    src="https://i.ibb.co/hRJSzzf/312911740-3345758609085198-1646186364150259632-n.jpg"
                    alt="Card image cap">
                    <div class="card-body pt-1 text-center">
                        <h5 class="card-title ">Kitty Moon</h5>
                        <p>Game Reviewer & Uploader</p>
                        {{-- <p class="card-text">
                            Game Review နှင့် ဂိမ်းတင်
                        </p> --}}
                        <a href="https://www.facebook.com/khinwint.wintwah" class="btn py-2 btn-outline-info"><i class="feather-facebook"></i></a>
                        <a href="tel:" class="btn py-2 btn-outline-primary"><i class="feather-phone"></i>
                            </a>
                            <a href="https://m.me/100009532748622" class="btn py-2 btn-outline-success"><i class="feather-message-circle"></i>
                            </a>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-5 col-lg-4 py-2 px-1">
                <div class="card shadow">
                    <img class="card-img-top mx-auto rounded-circle"
                    src="https://i.ibb.co/88cYL5s/361843473-667775824785027-324858252898564397-n.jpg"
                    alt="Card image cap">
                    <div class="card-body pt-1 text-center">
                        <h5 class="card-title ">Thura Min Htin</h5>
                        <p>Game Uploader - Main</p>
                        <a href="https://www.facebook.com/thura.minhtin.338" class="btn py-2 btn-outline-info"><i class="feather-facebook"></i></a>
                        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                        <a href="tel:" class="btn py-2 btn-outline-primary"><i class="feather-phone"></i>
                            </a>
                            <a href="https://m.me/100050910216175" class="btn py-2 btn-outline-success"><i class="feather-message-circle"></i>
                            </a>
                    </div>
                </div>
            </div>
           
            <div class="col-10 col-md-5 col-lg-4 py-2 px-1">
                <div class="card shadow">
                    <img class="card-img-top mx-auto rounded-circle"
                    src="https://i.ibb.co/6w1ZSHV/316943408-590691273059455-5726382835977915627-n.jpg"
                    alt="Card image cap">
                    <div class="card-body pt-1 text-center">
                        <h5 class="card-title ">Mee Mee</h5>
                        <p>Game Uploader - Facebook</p>
                        <a href="https://www.facebook.com/profile.php?id=100063557618308" class="btn py-2 btn-outline-info"><i class="feather-facebook"></i></a>
                        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                        <a href="tel:" class="btn py-2 btn-outline-primary"><i class="feather-phone"></i>
                            </a>
                            <a href="https://m.me/100063557618308" class="btn py-2 btn-outline-success"><i class="feather-message-circle"></i>
                            </a>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-5 col-lg-4 py-2 px-1">
                <div class="card shadow">
                    <img class="card-img-top mx-auto rounded-circle"
                    src="{{ asset('dashboard/images/profile_default.png') }}"
                    alt="Card image cap">
                    <div class="card-body pt-1 text-center">
                        <h5 class="card-title ">Nyi Nyi Naing </h5>
                        <p>Game Reviewer & Uploader</p>
                        <a href="https://www.facebook.com/profile.php?id=100060092826612" class="btn py-2 btn-outline-info"><i class="feather-facebook"></i></a>
                        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                        <a href="tel:" class="btn py-2 btn-outline-primary"><i class="feather-phone"></i>
                            </a>
                            <a href="https://m.me/100060092826612" class="btn py-2 btn-outline-success"><i class="feather-message-circle"></i>
                            </a>
                    </div>
                </div>
            </div>

            {{-- <h2 class="col-12 my-2 pt-2 text-center text-light " style="line-height: 55px;">We Accept Advertising Services... </h2>
            <h3 class="col-12 my-2  text-center text-light" style="line-height: 45px;">If You Want More Details....</h3>
            <h4 class="col-12 my-1  text-center text-light " style="line-height: 35px;">Ph : <a href="tel:09971404793" style="text-decoration: none; color:white;"></a> </h4>
            <h4 class="col-12 my-1 text-center text-light " style="line-height: 30px;"> Fb : <a style="text-decoration: none; color:white;" href="https://www.facebook.com/aunghtetch0n">Aung Htet Chon</a> </h4> --}}
        </div>
    </div>
@endsection

</div>
