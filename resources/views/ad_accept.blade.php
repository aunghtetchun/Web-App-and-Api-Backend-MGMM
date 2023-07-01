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
                        src="https://scontent.frgn4-1.fna.fbcdn.net/v/t39.30808-6/339155057_529452982710820_3292823336732395938_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=MpK_Utddft4AX_c-I6I&_nc_ht=scontent.frgn4-1.fna&oh=00_AfDb0iYSHA_BAn62MJeTzd5fxoVg2BI0DnIT0eHf8TPNIQ&oe=64A4014D"
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
                        src="https://scontent.frgn4-1.fna.fbcdn.net/v/t39.30808-6/241028299_3011346525859743_4314705434315568289_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=174925&_nc_ohc=oSiyKf2NJXQAX9QmsUf&_nc_ht=scontent.frgn4-1.fna&oh=00_AfAjE7OrGOZb9x3c-FGZzU35VIpPNZBfv4QFRrn9QLj_JQ&oe=64A25F93"
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
                        src="https://scontent.frgn4-1.fna.fbcdn.net/v/t39.30808-6/295886137_579471423759860_5224964832594459551_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=174925&_nc_ohc=RwPvN_IYMBIAX8z355H&_nc_ht=scontent.frgn4-1.fna&oh=00_AfDHz0tmOxqQ4axKPcXQrIM6xqJaPWZHoPsbJIRj7-BJyg&oe=64A3B9DA"
                        alt="Card image cap">
                    <div class="card-body pt-1 text-center">
                        <h5 class="card-title ">Thura Min Htin</h5>
                        <p>Game Uploader</p>
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
                        src="https://scontent.frgn4-1.fna.fbcdn.net/v/t1.6435-1/133596016_107547971258297_6025802376082049311_n.jpg?stp=dst-jpg_p480x480&_nc_cat=106&ccb=1-7&_nc_sid=7206a8&_nc_ohc=RuQF29-QEJcAX8-ycOP&_nc_ht=scontent.frgn4-1.fna&oh=00_AfDzNIvpprKq007hF-HH-HfmVKrKBpVVfNEdnUXBrElsvg&oe=64BA2D0D"
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
            <div class="col-10 col-md-5 col-lg-4 py-2 px-1">
                <div class="card shadow">
                    <img class="card-img-top mx-auto rounded-circle"
                        src="https://scontent.frgn4-1.fna.fbcdn.net/v/t39.30808-1/316943408_590691273059455_5726382835977915627_n.jpg?stp=dst-jpg_p320x320&_nc_cat=103&ccb=1-7&_nc_sid=7206a8&_nc_ohc=RWnl8y1ZwSsAX9iIDIU&_nc_ht=scontent.frgn4-1.fna&oh=00_AfDhFlb1NnAtyEGyD78UF3D7c5OZy0kfrNPbsjIbqKetew&oe=64A4789C"
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
            

            {{-- <h2 class="col-12 my-2 pt-2 text-center text-light " style="line-height: 55px;">We Accept Advertising Services... </h2>
            <h3 class="col-12 my-2  text-center text-light" style="line-height: 45px;">If You Want More Details....</h3>
            <h4 class="col-12 my-1  text-center text-light " style="line-height: 35px;">Ph : <a href="tel:09971404793" style="text-decoration: none; color:white;"></a> </h4>
            <h4 class="col-12 my-1 text-center text-light " style="line-height: 30px;"> Fb : <a style="text-decoration: none; color:white;" href="https://www.facebook.com/aunghtetch0n">Aung Htet Chon</a> </h4> --}}
        </div>
    </div>
@endsection

</div>
