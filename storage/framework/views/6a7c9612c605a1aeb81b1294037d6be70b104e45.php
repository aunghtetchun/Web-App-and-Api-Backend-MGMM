<?php $__env->startSection('title'); ?>
    Mod Games Myanmar
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-12 p-0 pt-2 d-flex flex-wrap align-items-center">
            <div class="col-12 all_photo py-0 py-md-3 py-md-1 px-0 text-center mr-auto text-white border border-dark"
                style="background: rgb(35 41 220);">
                <div class="py-0">
                    <h5 class="mt-3 mt-md-1 font-weight-bold px-0" style="line-height: 39px">ကြော်ငြာနှင့် Website အပ်လိုပါက
                    </h5>
                    <h5 class=" mb-1 px-0"> <a href="tel:09971404793" style="text-decoration: none; color:white; "> <i
                                class="feather-phone-outgoing"></i> 09971404793</a> ကိုဆက်သွယ်ပါ</h5>
                    <p class="mt-2 mb-0 px-0">( <span class="text-danger"> X </span>လောင်းကစားကြော်ငြာများလက်မခံပါ <span
                            class="text-danger"> X </span> )</p>
                </div>
                <div class="py-0 ">
                    <div class="d-none d-md-block">
                        <h5 class="mt-3 mt-md-1 font-weight-bold px-0" style="line-height: 39px">ကြော်ငြာနှင့် Website
                            အပ်လိုပါက </h5>
                        <h5 class=" mb-1 px-0"> <a href="tel:09971404793" style="text-decoration: none; color:white; "> <i
                                    class="feather-phone-outgoing"></i> 09971404793</a> ကိုဆက်သွယ်ပါ</h5>
                        <p class="mt-2 mb-0 px-0">( <span class="text-danger"> X </span>လောင်းကစားကြော်ငြာများလက်မခံပါ <span
                                class="text-danger"> X </span> )</p>
                    </div>
                    <img src="https://i.ibb.co/k8pMx2w/Screenshot-from-2023-10-02-14-40-57.png"
                        class="w-100 d-block d-md-none h-100" alt="">
                </div>
                <div class="py-0">
                    <div class="d-none d-md-block">
                        <h5 class="mt-3 mt-md-1 font-weight-bold px-0" style="line-height: 39px">ကြော်ငြာနှင့် Website
                            အပ်လိုပါက </h5>
                        <h5 class=" mb-1 px-0"> <a href="tel:09971404793" style="text-decoration: none; color:white; "> <i
                                    class="feather-phone-outgoing"></i> 09971404793</a> ကိုဆက်သွယ်ပါ</h5>
                        <p class="mt-2 mb-0 px-0">( <span class="text-danger"> X </span>လောင်းကစားကြော်ငြာများလက်မခံပါ <span
                                class="text-danger"> X </span> )</p>
                    </div>
                    <img src="https://i.ibb.co/k8pMx2w/Screenshot-from-2023-10-02-14-40-57.png"
                        class="w-100 d-block d-md-none h-100" alt="">
                </div>
            </div>
            <h5 class="col-12 my-3 text-center py-3 text-white border font-weight-bold border-dark"
                style="background: rgb(35 41 220)">လူကြိုက်အများဆုံးဂိမ်းများ </h5>

            <form class="text-white w-100 mx-1 mt-2 mb-0" action="<?php echo e(route('game.gameSearch')); ?>" method="get"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-row align-items-end justify-content-center">
                    <div class="form-group col-10 col-md-5 pr-0">
                        
                        <input required type="text" class="form-control rounded-0 <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                            name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="ဂိမ်းရှာရန်... ">
                    </div>
                    <div class="form-group col-2 col-md-2 text-left  px-0" onclick="showElement()">
                        <button type="submit" class="btn rounded-0  btn-primary w-100 px-3"> <i
                                class="feather-search"></i></button>
                    </div>
                </div>
            </form>

            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 px-1 px-md-2 px-lg-3 col-md-6 col-lg-4 my-2">
                    <div class="col-12 rounded p-0 bg-light d-flex flex-wrap align-items-center game_card "
                        style="cursor: pointer; border-radius:0.5rem!important;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset; ">

                        <!-- <div class="col-3 px-0 pt-0 rounded" style="height:90px; border-radius:0.5rem!important; overflow:hidden; background-image: url()">

                                        </div> -->
                        <div class="col-3 pl-2 pr-2 py-2 rounded">
                            <img class="p-0  px-0 pt-0 cropped" src="<?php echo e(asset('/storage/logo/' . $post->logo)); ?>"
                                alt="Card image cap"
                                onclick="location.href='<?php echo e(route('game.singleGameList', $post->slug)); ?>'"
                                style="border-radius:0.5rem!important; ">
                        </div>
                        <div class="col-9 p-0 pr-1 text-center card-body pt-1 "
                            onclick="location.href='<?php echo e(route('game.singleGameList', $post->slug)); ?>'" style="padding: 13px">
                            <p class="card-title w-100 mb-0 "
                                style="font-size: 14px; color:black; overflow:hidden; height:20px;"><?php echo e($post->name); ?></p>
                            <div class="star" style="color:#ffe100 !important;">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <?php if($i <= $post->rating): ?>
                                        <i class="fas fa-star fa-fw"></i>
                                    <?php else: ?>
                                        <i class="far fa-star fa-fw"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>

                            <h6 class="text-center m-0 p-0 list_badge badge badge-success px-2 py-1" style="top: 30%;"><i
                                    class="feather-eye "></i> <?php echo e($post->count); ?></h6>
                            <?php if($post->new == 1): ?>
                                <h6 class="text-center m-0 p-0 list_badge badge badge-danger px-1 py-1" style="top: 55%;"><i
                                        class="feather-arrow-up-circle"></i> update</h6>
                            <?php elseif($post->new == 2): ?>
                                <h6 class="text-center m-0 p-0 list_badge badge badge-primary px-1 py-1" style="top: 55%;">
                                    <i class="feather-gift"></i> new
                                </h6>
                            <?php endif; ?>
                            <p class="text-mutedd mb-0" style="font-size: 11px;"> Version : <?php echo e($post->version); ?> </p>
                            <p class="card-text text-muted mb-2 " style="font-size: 12px;"><?php echo e($post->size); ?>

                                <?php if(strpos(strtolower($post->type), 'offline') !== false && strpos(strtolower($post->type), 'online') !== false): ?>
                                    <span class="text-danger font-weight-bold">, Offline</span>
                                    <span class="text-success font-weight-bold"> & Online</span>
                                <?php elseif(strpos(strtolower($post->type), 'online') !== false): ?>
                                    <span class="text-success font-weight-bold">, Online</span>
                                <?php elseif(strpos(strtolower($post->type), 'offline') !== false): ?>
                                    <span class="text-danger font-weight-bold">, Offline</span>
                                <?php endif; ?>
                            </p>

                        </div>
                        
  

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 text-center my-3">
                <a href="<?php echo e(route('game.gameList')); ?>" class="btn px-4  text-light font-weight-bold py-2 rounded-0"
                    style="background-color: #a81d1d;"> See More <i class="feather-arrow-right"></i></a>
            </div>
            <h5 class="col-12 my-3 text-center py-3 text-white border font-weight-bold border-dark"
                style="background: rgb(35 41 220)">Popular Software </h5>
            <!-- rgb(0 255 152) 1px 0px 72px -7px -->
            <form class="text-white w-100 mx-1 mt-2 mb-0" action="<?php echo e(route('software.softwareSearch')); ?>" method="get"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-row align-items-end justify-content-center">
                    <div class="form-group col-10 col-md-5 pr-0">
                        
                        <input required type="text" class="form-control rounded-0 <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                            name="name" id="name" value="<?php echo e(old('name')); ?>"
                            placeholder="software ရှာရန်... ">
                    </div>
                    <div class="form-group col-2 col-md-2 text-left  pl-0" onclick="showElement()">
                        <button type="submit" class="btn rounded-0  btn-primary px-3"> <i
                                class="feather-search"></i></button>
                    </div>
                </div>
            </form>
            <?php $__currentLoopData = App\Software::latest()->limit(12)->inRandomOrder()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 px-1 px-md-2 px-lg-3 col-md-6 col-lg-4 my-2">
                    <div class="col-12 rounded p-0 bg-light d-flex flex-wrap align-items-center game_card "
                        style="cursor: pointer; border-radius:0.5rem!important;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset; ">

                        <!-- <div class="col-3 px-0 pt-0 rounded" style="height:90px; border-radius:0.5rem!important; overflow:hidden; background-image: url()">

                            </div> -->
                        <div class="col-3 pl-2 pr-2 py-2 rounded">
                            <img class="p-0  px-0 pt-0 cropped" src="<?php echo e(asset('/storage/slogo/' . $post->logo)); ?>"
                                alt="Card image cap"
                                onclick="location.href='<?php echo e(route('software.singleSoftwareList', $post->slug)); ?>'"
                                style="border-radius:0.5rem!important; ">
                        </div>
                        <div class="col-9 p-0 pr-1 text-center card-body pt-1 "
                            onclick="location.href='<?php echo e(route('software.singleSoftwareList', $post->slug)); ?>'"
                            style="padding: 13px">
                            <p class="card-title w-100 mb-0 "
                                style="font-size: 14px; color:black; overflow:hidden; height:20px;"><?php echo e($post->name); ?>

                            </p>
                            <div class="star" style="color:#ffe100 !important;">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <?php if($i <= $post->rating): ?>
                                        <i class="fas fa-star fa-fw"></i>
                                    <?php else: ?>
                                        <i class="far fa-star fa-fw"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>


                            <h6 class="text-center m-0 p-0  badge badge-success px-1 py-1"
                                style="position:absolute; min-width:55px; top: 30%; right:0; font-size: 12px"><i
                                    class="feather-eye"></i> &nbsp; <?php echo e($post->count); ?></h6>
                            
                            <p class="text-mutedd mb-0" style="font-size: 11px;"> Mod : <?php echo e($post->features); ?> </p>
                            <p class="card-text text-muted mb-2 " style="font-size: 12px;"><?php echo e($post->size); ?></p>

                        </div>
                        <!-- <div class="col-12 p-0 pt-2">
                            <img class="w-100 rounded" src="<?php echo e(asset('/storage/post/')); ?>" alt="" style="border-radius:0.8rem!important;">
                            
                        </div> -->


                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 text-center mt-4">
                <a href="<?php echo e(route('software.softwareList')); ?>"
                    class="btn px-4  text-light font-weight-bold py-2 rounded-0" style="background-color: #a81d1d;"> See
                    More <i class="feather-arrow-right"></i></a>
            </div>



        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>
    <script>
        $(document).ready(function() {
            $('.all_photo').slick({
                dots: false,
                infinite: true,
                speed: 1200,
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                adaptiveHeight: false,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            autoplay: false,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
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
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.game_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/welcome.blade.php ENDPATH**/ ?>