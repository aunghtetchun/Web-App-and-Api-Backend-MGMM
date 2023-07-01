<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <link rel="icon" href="<?php echo e(asset(\App\Custom::$info['c-logo'])); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(\App\Custom::$info['main_css'])); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/feather-icons-web/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/font-awesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/animate_it/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/summernote/summernote.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/data_table/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/slick/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/slick/slick-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/venobox/venobox.css')); ?>">
    <link href="<?php echo e(asset('dashboard/vendor/select_2/dist/css/select2.min.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="<?php echo e(asset('dashboard/vendor/multi_img_up/dist/image-uploader.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('dashboard/vendor/chart_js/Chart.css')); ?>" rel="stylesheet" />

    <?php echo $__env->yieldContent('head'); ?>
</head>
<body>

    <div class="container-fluid">
        <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->guard()->guest()): ?>
            <?php echo $__env->yieldContent("content"); ?>
        <?php endif; ?>
        <?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
            <div class="row">
                <!--        aside left start -->
                <div class="col-12 col-md-6 col-lg-3 col-xl-2 vh-100 aside-menu p-0">
                    <?php echo $__env->make('dashboard.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!--        aside left end -->
                <div class="col-12 col-md-12 col-lg-9 col-xl-10 vh-100 mt-2 content">
                    <div class="container-fluid">
                        <div class="row">


                            <!-- content start-->
                            <div class="col-12 px-0 px-md-4">
                                <?php echo $__env->make('dashboard.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 loader">
                                            <div class="d-flex justify-content-center align-items-center vh-100 ">
                                                <div class="spinner-grow text-primary" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 px-0 py-3 min-vh-100 page-content" style="display: none;">
                                        <!--                                    card area start-->
                                        <?php echo $__env->yieldContent('content'); ?>

                                        <!--                                    card area end-->
                                        </div>

                                        <div class="col-12 p-0 my-3">
                                            <div class="alert-secondary  rounded d-flex flex-column flex-md-row justify-content-between text-secondary py-2 px-3">
                                                <div>
                                                    Copy Right @ <?php echo e(\App\Custom::$info['short_name']); ?> <?php echo e(date("Y")); ?>

                                                </div>
                                                <div>
                                                    Developed By <a class="text-primary font-weight-bold" target="_blank" href="https://www.facebook.com/aunghtetcho0n/">Aung Htet Chon</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--content end                    -->

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php echo $__env->make("dashboard.toast", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Scripts -->
    <script src="<?php echo e(asset('dashboard/js/jquery.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('dashboard/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/data_table/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/data_table/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/summernote/summernote.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/venobox/venobox.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/slick/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/select_2/dist/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/multi_img_up/dist/image-uploader.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/chart_js/Chart.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/chart_js/Chart.bundle.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            $('.venobox').venobox({                      // default: ''
                frameheight: '600px',                            // default: ''
                bgcolor    : '#5dff5e',                          // default: '#fff'
                titleattr  : 'data-title',                       // default: 'title'
                numeratio  : true,                               // default: false
                infinigall : true,                               // default: false
            });
        });
    </script>
    <?php echo $__env->yieldContent('foot'); ?>

</body>
</html>
<?php /**PATH /var/www/modgamesmm/resources/views/dashboard/app.blade.php ENDPATH**/ ?>