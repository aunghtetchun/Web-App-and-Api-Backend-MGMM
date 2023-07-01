<?php $__env->startSection('meta_title'); ?>
    Mod Games MM <?php echo e($game->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_image'); ?>
    <?php echo e(asset('/storage/logo/' . $game->logo)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Mod Games Myanmar Download
<?php $__env->stopSection(); ?>
<?php $__env->startSection('head'); ?>
    <style>
        /* .eighteen{
                            display:none;
                        } */
        .nbar {
            display: none;
        }
        .collapse>.card-body{
            line-height: 1.7 !important;
            /* font-size: 17px !important; */

        }
        .btn-link{
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container  px-0 my-2 " style=" min-height:100vh;">

        <div class="col-12 pt-2 d-flex flex-wrap align-items-center">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($game->name); ?></h5>
                        <hr>
                        
                        <div
                            class="col-12 px-0 d-flex flex-wrap justify-content-center text-center text-dark align-items-center">
                            <!-- <div class="col-12 text-center font-weight-bold text-dark h4">
                                                            <span id="countdown" style="line-height: 40px">Please Wait 10 စက္ကန့်</span>
                                                        </div> -->

                            <?php if(isset($game->link1)): ?>
                                <div class="col-12 px-0 px-md-2 col-md-4 dllink" id="download_link1">
                                    <a href="<?php echo e($game->link1); ?>" target="_blank"
                                        class="btn btn-block py-2 btn-outline-primary mb-2"><i class="feather-arrow-down"></i>
                                        <?php echo e($game->name_1); ?></a>
                                </div>
                            <?php endif; ?>

                            <!--<?php echo e($game); ?>-->
                            <?php if(isset($game->link2)): ?>
                                <div class="col-12 px-0 px-md-2 col-md-4 dllink" id="download_link2">
                                    <a href="<?php echo e($game->link2); ?>" target="_blank"
                                        class="btn btn-block py-2 btn-outline-primary mb-2"><i class="feather-arrow-down"></i>
                                        <?php echo e($game->name_2); ?> </a>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($game->link3)): ?>
                                <div class="col-12 px-0 px-md-2 col-md-4 dllink" id="download_link3">
                                    <a href="<?php echo e($game->link3); ?>" target="_blank"
                                        class="btn btn-block py-2 btn-outline-primary mb-2"><i class="feather-arrow-down"></i>
                                        <?php echo e($game->name_3); ?></a>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>
                    <div class="card-footer font-weight-bolder text-info text-center">
                        <?php echo e($game->count); ?> Users </span> download
                        <h6 class="warning_download">ဒေါင်းမရပါက မရသည့်ဂိမ်းအောက်တွင် ကွန်မန့် (comment)
                            ချန်ထားခဲ့ပေးပါခင်ဗျာ... </h6>
                        <h6 class="warning_download">ဘယ်ဂိမ်းတွေကမရလည်းသိမှ ပြန်ပြင်ပေးရတာမြန်တဲ့အတွက်ကြောင့်ပါ ခင်ဗျာ...
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="accordion" id="accordionExample">
                    <h5 class="text-center py-2 border border-dark mt-3 mb-0">အမေးများဆုံးမေးခွန်းများ</h5>
                    <div class="card" style="border-top: 0;">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button class="btn btn-link text-danger px-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="feather-help-circle"></i> တစ်ချို့ဂိမ်းတွေက ဆော့မရဘူး ?
                          </button>
                        </h2>
                      </div>
            
                      <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body h6">
                           မိမိဒေါင်းလိုက်တဲ့ဂိမ်းဆော့မရခြင်းနဲ့ပက်သက်ပြီး ဖြစ်နိုင်တဲ့အချက်များက <br>
                           ၁။ ဂိမ်းObb ဒါမှမဟုတ် Data ဖိုင်ထည့်တာမှားတာ မျိုးဆို ဝင်ပီးရင် ဆော့မရဘဲ ဖြစ်တတ်ပါတယ်... <br>
                           &nbsp; &nbsp;( အထဲရောက်ပီးမှ ဖိုင်မရှိကြောင်းပြပီး ဘာမှဆက်မဖြစ်လာတာမျိုးဆို နံပါတ် ၁ အချက်ကြောင့်ဖြစ်ပါတယ်)  <br>
                           ၂။ မိမိဒေါင်းလိုက်တဲ့ဂိမ်းက ထွက်ထားတာအရမ်းကြာနေပြီမို့ ဖုန်းနဲ့မကိုက်တော့တာကြောင့်လည်း ဆော့မရဖြစ်တတ်ပါတယ်... <br>
                           ၃။ ဖုန်းကအမျိုးအစားနိမ့်နေပြီး ဂိမ်းက ဖုန်းအမြင့်လိုအပ်တဲ့ဂိမ်းဖြစ်နေရင်လည်း ဆော့မရဖြစ်တတ်ပါတယ်... <br>
                           &nbsp; &nbsp;( ဝင်လိုက်တာနဲ့ ဘာမှမပြဘဲ တန်းထွက်သွားတာမျိုးဆို နံပါတ် ၂ နဲ့ ၃ အချက်ကြောင့်ဖြစ်ပါတယ်) <br>
                           ၄။ ခိုးပီးသားဂိမ်းတော်တော်များများက ဆော့နေတဲ့အချိန် ဂိမ်းထဲဝင်တဲ့အချိန်မှာ အင်တာနက် လုံးဝဖွင့်ထားလို့မရပါဘူး ဖွင့်မိလို့ mod err တက်ပြီးဆော့မရတာမျိုးလည်းဖြစ်နိုင်ပါတယ်... <br>
                           ၆။ ဂိမ်းက Update ထွက်လာလို့ update တင်ခိုင်းနေပီး မတင်တာကြောင့်ဆော့မရတာမျိုးလည်းဖြစ်တတ်ပါတယ်... <br>
                           &nbsp; &nbsp;(အဲလိုမျိုးဆို comment ရေးခဲ့ပီး update request လုပ်နိုင်ပါတယ်...) <br>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="btn btn-link text-danger px-0 collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="feather-download"></i> ဂိမ်းဒေါင်းတာ အဆင်မပြေဘူး ?
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body h6">
                            ဂိမ်းဒေါင်းတာ ဒေါင်းမရတာဖြစ်စေနိုင်တဲ့အချက်များမှာ <br>
                            ၁။ ဂိမ်း download link ကသေနေလို့ ဝင်ဒေါင်းတဲ့အခါ ဘာမှမပြဘဲ ဖြစ်နေတာဖြစ်နိုင်ပါတယ်... <br>
                            &nbsp; &nbsp;(အဲလိုမျိုးဆို မရတဲ့ဂိမ်းအောက်မှာ comment ရေးထားခဲ့ယုံပါဘဲ)<br>
                            ၂။ Google Drive လင့်ဖြစ်နေလို့ဒေါင်းမရတာမျိုးဖြစ်နိုင်ပါတယ်...facebook ကနေလင့်တွေဝင်ဒေါင်းတဲ့အခါ မိမိဖုန်း browser ကိုမရောက်ဘဲ facebook browser မှာဘဲဖြစ်နေလို့ ဒေါင်းမရတာမျိုးကြောင့်ပါ<br>
                            &nbsp; &nbsp;( Open in browser ကနေဖြစ်ဖြစ် ဂိမ်းလင့်ကို ကော်ပီကူးပီးဖြစ်ဖြစ် ဖုန်း browser ကနေပီးဒေါင်းလို့ရပါတယ်)<br>
                            ၃။ ကြော်ငြာလင့်တွေမကျော်တတ်တာကြောင့်လည်းဖြစ်နိုင်ပါတယ်<br>
                            &nbsp; &nbsp;( တစ်ချို့လင့်တွေက ကြော်ညာခံထားတဲ့လင့်တွေဖြစ်တတ်တဲ့အတွက် ဂိမ်းတင်တဲ့သူကို ဒေါင်းနည်းသွားမေးနိုင်ပါတယ်...)<br>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                          <button class="btn btn-link text-danger px-0 collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="feather-upload"></i>   ဂိမ်းတွေ ဒီထဲမှာ လာတင်လို့ရလား ?
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body h6">
                            ဂိမ်းတွေ ဒီထဲမှာလာတင်ဖို့အတွက်ဆို Admin - Aung Htet Chon အကောင့်ကို လာပြောလို့ရပါတယ်... <br>
                            ပုံမှန်ဂိမ်းတင်နိုင်တယ် ပေ့တွေ ဂရုတွေမှာလည်း ပြန်တင်နိုင်တယ် ဆို အမြဲ ကြိုဆိုပါတယ်... <br>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                          <h2 class="mb-0">
                            <button class="btn btn-link text-danger px-0 collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <i class="feather-share-2"></i> ဂိမ်းတွေ အပြင်မှာပြန်ယူတင်လို့ရလား ?
                            </button>
                          </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                          <div class="card-body h6">
                              ပြန်ယူတင်လို့ ရပါတယ်... ဒီထဲက ဘယ်ဂိမ်းကိုမဆို မိမိကြိုက်တဲ့နေရာမှာပြန်ယူတင်လို့ရပါတယ်... <br>
                              ပြန်ယူတင်တဲ့အခါ Download Link ကို website လင့်ထည့်ပေးဖို့တော့လိုပါမယ်...<br>
                              Link ဥပမာ - modgamesmm.com/games/ဂိမ်းနာမည် <br>
                          </div>
                        </div>
                      </div>
                  </div>
            
            </div>
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">MGMM Apk</h5>
                        <hr>
                        <p class="card-text">MGMM website အား ဖုန်း Apk အဖြစ်အသုံးပြုနိုင်ပါပြီရှင်...</p>
                        <a href="https://mega.nz/file/WNxVkZKI#rr5EzefzcUwurQvc14m6ow2wUQss18W9bo5iv7UnFOQ"
                            class="btn w-100 mb-2 btn-outline-primary">Download apk (mega)</a>
                        <a href="https://www.mediafire.com/file/fe8inzb2ejs7ywc/modgamesmm.apk/file"
                            class="btn w-100 btn-outline-primary mb-2">Download apk (mediafire)</a>
                        <a href="https://drive.google.com/file/d/1uTBrrvqUMeBVj0uvSRGeVnwOWvKOmFxH/view?usp=drive_link"
                            class="btn w-100 btn-outline-primary">Download apk (gdrive)</a>
                    </div>
                </div>
            </div>

            <?php if(isset($game->category_id)): ?>
                <div class="col-12 d-flex flex-wrap justify-content-center px-0 mt-0">
                    <div class="responsive col-12 col-lg-9 px-0 mt-0 d-flex flex-wrap justify-content-center pb-3">
                        <h3 class="col-12 font-weight-bolder  text-center my-3">Similar Games</h3>
                        <?php $__currentLoopData = App\Category::find($game->category_id)->posts()->inRandomOrder()->limit(8)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card game_card px-1 col-3 col-lg col-md rounded-0"
                                onclick="location.href='<?php echo e(route('game.singleGameList', $similar->slug)); ?>'"
                                style="cursor: pointer;">
                                <img class="card-img-top" src="<?php echo e(asset('/storage/logo/' . $similar->logo)); ?>"
                                    alt="Card image cap"
                                    style="width: 100%; border-radius:13px; max-height: 85px; padding: 2px;">
                                <div class="card-body pt-1 pb-2" style="padding: 13px">
                                    <p class="card-title w-100 "
                                        style="font-size: 14px; color:black; overflow:hidden; height:39px;">
                                        <?php echo e($similar->name); ?></p>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
            <?php endif; ?>
            <div class="col-12 px-0 text-center">
                <h4 class="col-12 font-weight-bolder  text-center mt-4 mb-1">Comment</h4>
                <ul class="list-group text-left col-12 p-0">
                    <?php $__currentLoopData = \App\Comment::where('post_id', $game->id)->latest()->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item text-light w-100 mb-1"
                            style="background-color: rgba(196,57,57,0.8) !important;"><?php echo e($cmt->comment); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <form class=" mt-2 pb-2" action="<?php echo e(route('commentGame.storeComment')); ?>" method="post"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e($game->id); ?>" name="post_id">
                    <div class="form-group">
                        <textarea required name="comment" id="comment" class="form-control <?php if ($errors->has('comment')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('comment'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                            name="comment" id="" rows="2"><?php echo e(old('comment')); ?></textarea>
                        <?php if ($errors->has('comment')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('comment'); ?>
                            <small class="invalid-feedback font-weight-bold" role="alert">
                                <?php echo e($message); ?>

                            </small>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <button type="submit" class="btn btn-block form-control text-light  py-2"
                        style="background-color: #a81d1d"><i class="fas fa-plus-square mr-1"></i> Comment</button>
                </form>
            </div>
        </div>



    </div>
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>
    <script>
        //     $(document).ready(function(){
        //         // $('.responsive').slick({
        //         //     dots: true,
        //         //     infinite: true,
        //         //     speed: 300,
        //         //     arrows: false,
        //         //     slidesToShow: 5,
        //         //     slidesToScroll: 1,
        //         //     autoplay: true,
        //         //     autoplaySpeed: 1500,
        //         //     responsive: [
        //         //         {
        //         //             breakpoint: 1024,
        //         //             settings: {
        //         //                 slidesToShow: 4,
        //         //                 slidesToScroll: 1,
        //         //                 infinite: true,
        //         //                 dots: true
        //         //             }
        //         //         },
        //         //         {
        //         //             breakpoint: 600,
        //         //             settings: {
        //         //                 slidesToShow: 3,
        //         //                 slidesToScroll: 1
        //         //             }
        //         //         },
        //         //         {
        //         //             breakpoint: 480,
        //         //             settings: {
        //         //                 slidesToShow: 3,
        //         //                 slidesToScroll: 1
        //         //             }
        //         //         }
        //         //         // You can unslick at a given breakpoint now by adding:
        //         //         // settings: "unslick"
        //         //         // instead of a settings object
        //         //     ]
        //         // });
        //         var count = 7;

        //         (function(){
        //             timerCount();
        //         })();
        //         $(window).on('focus', function() {
        // //   console.log('Webpage is open');
        // count += 4;
        //   timerCount();
        //                       $('html, body').animate({ 
        //       scrollTop:0
        //     }, 500);
        //   // Perform actions when the webpage is in focus
        // });
        //         function timerCount(){
        //             var message = "%d seconds before download link appears";

        //             var countdown_element = document.getElementById("countdown");

        //             var dscroll = document.getElementById("dscroll");
        //             var thanks = document.getElementById("thanks");
        //             var finish = document.getElementById("finish");



        // // $(window).on('blur', function() {
        // //     count=7;
        // //     // alert(page);
        // //   console.log('Webpage is not open');
        // //   // Perform actions when the webpage is not in focus
        // // });
        //             var timer = setInterval(function(){
        //                 if (count) {
        //                     dscroll.style.overflow="hidden";
        //                     $(".dllink").addClass("d-none");
        //                     countdown_element.innerHTML = "Please Wait %d စက္ကန့် to download".replace("%d", count);
        //                     count--;
        //                 } else {
        //                     clearInterval(timer);

        //                     dscroll.style.overflow="scroll";
        //                     $(".dllink").removeClass("d-none");
        //     countdown_element.innerHTML = "အောက်သို့ဆွဲပါ ";
        //                 }

        //             }, 1000);

        // }
        // });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.game_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/download.blade.php ENDPATH**/ ?>