<?php $__env->startSection('meta_gtitle'); ?><?php echo e($game->name); ?> mgmm <?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_gdescription'); ?><?php echo e($game->name); ?> mgmm <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_gkeywords'); ?><?php echo e($game->name); ?> mgmm <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_title'); ?>MGMM <?php echo e($game->name); ?> mgmm <?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?>MGMM <?php echo e($game->name); ?> mgmm <?php $__env->stopSection(); ?>


<?php $__currentLoopData = $game->getPhoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startSection('og_image'); ?><?php echo e(asset('storage/post/' . $photo->name)); ?><?php $__env->stopSection(); ?>
<?php break; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startSection('twt_image'); ?><?php echo e(asset('storage/logo/' . $game->logo)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_icon'); ?><?php echo e(asset('storage/logo/' . $game->logo)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('lg_logo'); ?><?php echo e(asset('storage/logo/' . $game->logo)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>MGMM <?php echo e($game->name); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container  px-0 my-2" style="background:rgba(11,15,18,0.6);">

        <div class="col-12 pt-2 d-flex bg-light flex-wrap align-items-center" style="background: rgba(11,15,18,0.6); ">

            <form class="text-white w-100 mx-1 mt-2 mb-0" action="<?php echo e(route('game.gameSearch')); ?>" method="get" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-row align-items-end justify-content-center">
                    <div class="form-group col-10 col-md-5 pr-0">
                        
                        <input required type="text" class="form-control rounded-0 <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="ဂိမ်းရှာရန်... ">
                    </div>
                    <div class="form-group col-2 col-md-2 text-left  pl-0">
                        <button type="submit" class="btn rounded-0  btn-primary px-3"> <i class="feather-search"></i></button>
                    </div>
                </div>
            </form>
            <div class="d-flex col-12 flex-wrap align-items-start justify-content-center">
                <div class="col-3 col-md-2 col-xs-12 col-md-2 px-1 my-3 border pt-1 border-danger bg-light"
                    style="border: 2px solid; color: rgb(6 28 116); ">
                    <img src="<?php echo e(asset('/storage/logo/' . $game->logo)); ?>" style="width: 100%;  margin-bottom: 5px;"
                        alt="">
                </div>
                <div class="col-9 col-md-12 px-0">
                    <h5 class="col-12 mt-4 mb-2 text-center text-md-start  font-weight-bold "><?php echo e($game->name); ?> </h5>

                    <div class="star text-center col-12 h5 my-2" data-toggle="modal"
                    data-target="#exampleModal<?php echo e($game->id); ?>">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <?php if($i <= floor(collect($game->rating)->avg())): ?>
                            <i class="fas fa-star fa-fw"></i>
                        <?php else: ?>
                            <i class="far fa-star fa-fw"></i>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                </div>
                <h5 class="col-12 my-1 text-center">
                    
                    <div class="col-12 px-0 text-center ">
                        <?php $__currentLoopData = App\Post::find($game->id)->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('game.gameListFilter', $c->id)); ?>"
                                class="badge badge-danger badge-pill font-weight-bold  px-3 py-2 my-1 mx-1">
                                <?php echo e($c->title); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </h5>
            </div>
            
         
            <div class="d-flex col-12  flex-wrap px-1 justify-content-around ">
                  
                  <div class="modal fade" id="exampleModal<?php echo e($game->id); ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModal<?php echo e($game->id); ?>Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content text-center" style="background-color: #a81d1d !important;">
                            <div class="modal-header">
                                <h5 class="modal-title " id="exampleModal<?php echo e($game->id); ?>Label">How much
                                    do you like <?php echo e($game->name); ?> ...</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-dark">x</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('addRating.storeRating')); ?>" method="post"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
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
                                        <?php if ($errors->has('rating')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('rating'); ?>
                                            <small class="invalid-feedback font-weight-bold" role="alert">
                                                <?php echo e($message); ?>

                                            </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        <input type="hidden" value="<?php echo e($game->id); ?>" name="post_id">
                                    </div>
                                    <input type="hidden" value="<?php echo e($game->id); ?>" name="wedding_package_id">
                                    <button type="submit" class="btn  px-3 py-2 "
                                        style="background-color: #080c0d;"><i class="fas fa-plus-square mr-1"></i>
                                        Rating</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 px-0 mt-2">
                    <table class="table table-bordered mx-0 px-0 w-100 table-striped">
                        <tbody>
                          <tr>
                            <td><i class="text-primary feather-cpu"></i> Company</td>
                            <td><?php echo e($game->developer); ?></td>
                          </tr>
                          <tr>
                            <td><i class="text-primary feather-calendar"></i> Updated</td>
                            <td><?php echo e($game->updated); ?></td>
                          </tr>
                          <tr>
                            <td><i class="text-primary feather-save"></i> Size</td>
                            <td><?php echo e($game->size); ?></td>
                          </tr>
                          <tr>
                            <td><i class="text-primary feather-layers"></i> Version</td>
                            <td><?php echo e($game->version); ?></td>
                          </tr>
                          <tr>
                            <td><i class="text-primary feather-settings"></i> Requierment</td>
                            <td> <?php echo e($game->requirement); ?></td>
                          </tr>
                          <tr>
                            <td><i class="text-primary feather-package"></i> Type</td>
                            <td> <?php echo e($game->type); ?></td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                
            </div>
            <div class="col-12 d-flex flex-wrap g_img  px-0">
                <h4 class="col-12 my-4 font-weight-bolder text-center">Gameplay Photos</h4>

                <div class="col-12 px-0 bg-light px-md-2">
                    <div class="all_photo">
                        <?php $__currentLoopData = $game->getPhoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="px-lg-1 px-md-1 px-0">
                                <a class="venobox" data-gall="myGallery"
                                    href="<?php echo e(asset('/storage/post/' . $photo->name)); ?>">
                                    <img class="w-100" src="<?php echo e(asset('/storage/post/' . $photo->name)); ?>"
                                        alt="">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="col-12 text-center px-0 px-md-2 px-lg-4">
                    <h4 class="col-12 font-weight-bolder my-4">Gameplay Video</h4>
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?php echo $game->video; ?>"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="col-12 pt-2  text-center bg-light" style="color:#080c0d; line-height:2;">
                    <h4 class="col-12 font-weight-bolder mt-3 pb-0 mb-0 text-center ">About Game</h4>
                    
                    
                    
                    <p class=""><?php echo $game->description; ?></p>
                   
                    
                </div>

                <div class="col-12 text-primary text-center pb-1 px-0 my-0">
                    <div class="col-12 px-0 pb-4 bg-light">
                        <h4 class="col-12  font-weight-bolder text-center pt-3" style="color: black;">Mod Features</h4>
                        <p class="px-3" style=" line-height: 29px;"><?php echo $game->features; ?></p>
                        <h4 class="col-12  font-weight-bolder text-center pt-3" style="color: black;">Download Here</h4>
                        <div class="col-12  px-0 d-flex flex-wrap pt-3 pb-4 justify-content-center">
                            <a href="<?php echo e(route('download', $game->id)); ?>"
                                class="btn btn-primary px-4 rounded-0 py-2">Download Now</a>
                              
                                <h6 class="col-12 mt-2 warning_download">ဒေါင်းမရပါက မရသည့်ဂိမ်းအောက်တွင် ကွန်မန့် (comment) ချန်ထားခဲ့ပေးပါခင်ဗျာ...  </h6>
                        <h6 class="col-12 warning_download">ဘယ်ဂိမ်းတွေကမရလည်းသိမှ ပြန်ပြင်ပေးရတာမြန်တဲ့အတွက်ကြောင့်ပါ ခင်ဗျာ... </h6>
                        <div class="col-12 mt-3 text-center">
                            <a class="btn px-3 py-2 text-light" style="background: rgb(60, 60, 187)" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(Request::url())); ?>" target="_blank"> <i class="feather-facebook"></i> Share on Facebook</a>
                        </div>
                        </div>
                        <h6 class="py-1  col-9 col-md-6 my-1  mx-auto border border-success btn-outline-info badge-pill ">
                            Upload By <?php echo e($game->getUser->name); ?></h6>
                    </div>
                    
                </div>
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

                <div class="col-12 d-flex flex-wrap justify-content-center px-0">
                    <h4 class="col-12 font-weight-bolder text-center my-3">Similar Games</h4>
                    <div class="responsive col-12 px-0 col-lg-9 pb-3 d-flex flex-wrap align-items-center justify-content-center">
                        <?php $__currentLoopData = App\Category::find($game->category_id)->posts()->inRandomOrder()->limit(8)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card col-3 col-lg col-md game_card px-1 rounded-0"
                                onclick="location.href='<?php echo e(route('game.singleGameList', $similar->slug)); ?>'"
                                style="cursor: pointer; min-height: 141px;">
                                <img class="card-img-top" src="<?php echo e(asset('/storage/logo/' . $similar->logo)); ?>"
                                    alt="Card image cap"
                                    style="width: 100%; border-radius:13px; min-height: 76px;  max-height: 85px; padding: 2px;">
                                <div class="card-body pt-1 pb-2" style="padding: 13px">
                                    <p class="card-title w-100"
                                        style="font-size: 14px; color:black; overflow:hidden; height:39px;">
                                        <?php echo e($similar->name); ?></p>
                                    <!-- <p class="card-text text-muted " style="font-size: 12px; height:15px; overflow:hidden;"><?php echo e($similar->developer); ?></p> -->

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.game_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/seegame.blade.php ENDPATH**/ ?>