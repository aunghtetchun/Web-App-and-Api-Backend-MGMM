<?php $__env->startSection("title"); ?> Login <?php $__env->stopSection(); ?>
<?php $__env->startSection('head'); ?>
    <style>
        .login-content{
            background: white url('<?php echo e(asset('dashboard/images/login-img.svg')); ?>');
            background-size: contain;
            background-position: left;
            background-repeat: no-repeat;
        }
        @media  screen and (max-width: 420px){
            .login-content{
                background: white;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-8 m-auto">
            <div class="card login-content shadow animate__animated animate__zoomInDown">
                <div class="card-content">
                    <div class="row ">
                        <div class="col-12 col-md-6">
                            <img src="" class="w-100" alt="">
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="p-4">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset(\App\Custom::$info['c-logo'])); ?>" class="avatar shadow-sm border border-light mr-2" alt="">
                                    <p class="text-uppercase font-weight-bold text-primary mb-0">Admin Login</p>
                                </div>
                                <hr>
                                <form method="POST" action="<?php echo e(route('login')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group">
                                        <label for="email" class="text-secondary font-weight-bold d-flex align-items-end">
                                            <i class="feather-mail text-primary h4 mb-0 mr-2"></i>
                                            <span class="">User Name</span>
                                        </label>

                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                                            <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="text-secondary font-weight-bold d-flex align-items-end">
                                            <i class="feather-lock text-primary h4 mb-0 mr-2"></i>
                                            <span class="">Password</span>
                                        </label>

                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="current-password">

                                            <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                            <label class="form-check-label" for="remember">
                                                <?php echo e(__('Remember Me')); ?>

                                            </label>
                                        </div>

                                    </div>

                                    <div class="form-group mb-0">

                                        <button type="submit" class="btn btn-primary w-50 btn-rounded">
                                            <?php echo e(__('Login')); ?>

                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.lite', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/auth/login.blade.php ENDPATH**/ ?>