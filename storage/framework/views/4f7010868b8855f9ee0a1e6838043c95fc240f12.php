<?php $__env->startSection('meta_gtitle'); ?>
    <?php echo e($software->name); ?> mgmm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_gkeywords'); ?>
    <?php echo e($software->name); ?> mgmm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_gdescription'); ?>
    <?php echo e($software->name); ?> mgmm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_title'); ?>
    MGMM <?php echo e($software->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description'); ?>
    MGMM <?php echo e($software->name); ?>

<?php $__env->stopSection(); ?>
<?php $__currentLoopData = $software->getPhoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->startSection('og_image'); ?>
        <?php echo e(asset('storage/software/' . $photo->name)); ?>

    <?php $__env->stopSection(); ?>
<?php break; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->startSection('twt_image'); ?>
<?php echo e(asset('storage/slogo/' . $software->logo)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_icon'); ?>
<?php echo e(asset('storage/slogo/' . $software->logo)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('lg_logo'); ?>
<?php echo e(asset('storage/slogo/' . $software->logo)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
MGMM <?php echo e($software->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container  px-0 my-2 bg-light">

    <div class="col-12 pt-2 d-flex flex-wrap align-items-center bg-light">

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
                        name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="Software ရှာရန်... ">
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
                <img src="<?php echo e(asset('/storage/slogo/' . $software->logo)); ?>" style="width: 100%;  margin-bottom: 5px;"
                    alt="">
            </div>
            <div class="col-9 col-md-12 px-0">
                <h5 class="col-12 mt-4 mb-2 text-center text-md-start  font-weight-bold "><?php echo e($software->name); ?> </h5>

                <div class="star text-center col-12 h5 my-2" data-toggle="modal"
                    data-target="#exampleModal<?php echo e($software->id); ?>">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <?php if($i <= $software->rating): ?>
                            <i class="fas fa-star fa-fw"></i>
                        <?php else: ?>
                            <i class="far fa-star fa-fw"></i>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>

        </div>
        <div class="col-12 px-0 mt-2">
            <table class="table table-bordered mx-0 px-0 w-100 table-striped">
                <tbody>
                    <tr>
                        <td><i class="text-primary feather-cpu"></i> Company</td>
                        <td><?php echo e($software->developer); ?></td>
                    </tr>
                    <tr>
                        <td><i class="text-primary feather-calendar"></i> Updated</td>
                        <td><?php echo e($software->updated); ?></td>
                    </tr>
                    <tr>
                        <td><i class="text-primary feather-save"></i> Size</td>
                        <td><?php echo e($software->size); ?></td>
                    </tr>
                    <tr>
                        <td><i class="text-primary feather-layers"></i> Version</td>
                        <td><?php echo e($software->version); ?></td>
                    </tr>
                    <tr>
                        <td><i class="text-primary feather-settings"></i> Requierment</td>
                        <td> <?php echo e($software->requirement); ?></td>
                    </tr>
                    <tr>
                        <td><i class="text-primary feather-package"></i> Type</td>
                        <td> <?php echo e($software->type); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-12 d-flex flex-wrap g_img  px-0">
            <h4 class="col-12 my-4 font-weight-bolder text-center">Software Photos</h4>

            <div class="col-12 px-0 px-md-2 bg-light">
                <div class="all_photo">
                    <?php $__currentLoopData = $software->getPhoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="px-lg-1 px-md-1 px-0">
                            <a class="venobox" data-gall="myGallery"
                                href="<?php echo e(asset('/storage/software/' . $photo->name)); ?>">
                                <img class="w-100" src="<?php echo e(asset('/storage/software/' . $photo->name)); ?>"
                                    alt="">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-12 pt-2  text-center bg-light" style="color:#080c0d; line-height:2;">
                <h4 class="col-12 font-weight-bolder my-3 text-center ">About Software</h4>
                <p class=""><?php echo $software->description; ?></p>

            </div>
            <div class="col-12 text-primary text-center pb-3 px-0 my-0">
                <div class="col-12 px-0 bg-light">
                    <h5 class="col-12  font-weight-bolder text-center pt-2">Mod Features</h5>
                    <!--  -->
                    <p class="" style=" line-height: 29px;"><?php echo $software->features; ?></p>
                    <h5 class="col-12  font-weight-bolder text-center py-3">Download Here</h5>
                    <div class="col-12  p-0 d-flex flex-wrap pb-3 justify-content-center">
                        <a href="<?php echo e(route('software.download', $software->slug)); ?>"
                            class="btn btn-primary px-4 rounded-0 py-2">Download</a>
                    </div>
                    <h6 class="py-2  col-10 col-md-6 my-1 mx-auto border border-success btn-outline-info badge-pill ">
                        Upload By <?php echo e($software->getUser->name); ?></h6>
                </div>
            </div>




        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.game_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/seesoftware.blade.php ENDPATH**/ ?>