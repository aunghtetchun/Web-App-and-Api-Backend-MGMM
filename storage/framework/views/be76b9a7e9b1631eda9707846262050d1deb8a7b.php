<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo $__env->yieldContent("title"); ?></title>


    <link rel="stylesheet" href="<?php echo e(asset(\App\Custom::$info['main_css'])); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/feather-icons-web/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/font-awesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/animate_it/animate.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/style.css')); ?>">

    <?php echo $__env->yieldContent('head'); ?>
</head>
<body>

    <div class="min-vh-100 d-flex justify-content-between align-items-center">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="<?php echo e(asset('dashboard/js/jquery.js')); ?>"></script>
    <?php echo $__env->yieldContent("foot"); ?>
</body>
</html>
<?php /**PATH /var/www/modgamesmm/resources/views/dashboard/lite.blade.php ENDPATH**/ ?>