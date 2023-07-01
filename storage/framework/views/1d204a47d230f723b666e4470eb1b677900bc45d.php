<?php $__env->startSection("title"); ?> Edit Profile <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[]]); ?>
        <?php $__env->slot("last"); ?> Edit Profile <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <!-- <div class="col-12 col-md-4">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="mr-1 feather-lock text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Change Photo <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>  <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>

                        <img src="<?php echo e(isset(Auth::user()->photo) ? asset('storage/profile/'.Auth::user()->photo) : asset('dashboard/images/profile_default.png')); ?>" class="d-block w-50 mx-auto rounded-circle my-3" alt="">

                    <form action="<?php echo e(route('profile.changePhoto')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="d-flex justify-content-between align-items-end">
                            <div class="form-group mb-0">
                                <label for="email">
                                    <i class="mr-1 feather-image"></i>
                                    Select New Photo
                                </label>
                                <input type="file" name="photo" class="form-control p-1 mr-2 overflow-hidden" required>

                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-upload"></i>
                            </button>
                        </div>
                        <?php if ($errors->has("photo")) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first("photo"); ?>
                        <small class="font-weight-bold text-danger text-center"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </form>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>

                <?php $__env->startComponent("component.card"); ?>
                    <?php $__env->slot('icon'); ?> <i class="mr-1 feather-lock text-primary"></i> <?php $__env->endSlot(); ?>
                    <?php $__env->slot('title'); ?> Change Background <?php $__env->endSlot(); ?>
                    <?php $__env->slot('button'); ?>  <?php $__env->endSlot(); ?>
                    <?php $__env->slot('body'); ?>

                        <img src="<?php echo e(asset("/dashboard/css/main_bg.svg")); ?>" class="d-block w-100 mx-auto" alt="">

                        <form action="<?php echo e(route('photo.changeBackground')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="d-flex justify-content-between align-items-end">
                                <div class="form-group mb-0">
                                    <label for="background">
                                        <i class="mr-1 feather-image"></i>
                                        Select New Background
                                    </label>
                                    <input type="file" name="background" class="form-control p-1 mr-2 overflow-hidden" required>

                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="mr-1 feather-upload"></i>
                                </button>
                            </div>
                            <?php if ($errors->has("background")) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first("background"); ?>
                            <small class="font-weight-bold text-danger text-center"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </form>
                    <?php $__env->endSlot(); ?>
                <?php echo $__env->renderComponent(); ?>

        </div> -->

        <div class="col-12 col-md-4">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="mr-1 feather-user text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Change Name <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>  <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <form action="<?php echo e(route('profile.changeName')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-user"></i>
                                Your Name
                            </label>
                            <input type="text" name="name" class="form-control" value="<?php echo e(auth()->user()->name); ?>">
                            <?php if ($errors->has("name")) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first("name"); ?>
                            <small class="font-weight-bold text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" required>
                                <label class="custom-control-label" for="customSwitch1">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Name
                            </button>
                        </div>
                    </form>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent("component.card"); ?>
                    <?php $__env->slot('icon'); ?> <i class="mr-1 feather-mail text-primary"></i> <?php $__env->endSlot(); ?>
                    <?php $__env->slot('title'); ?> Change Email <?php $__env->endSlot(); ?>
                    <?php $__env->slot('button'); ?>  <?php $__env->endSlot(); ?>
                    <?php $__env->slot('body'); ?>
                        <form action="<?php echo e(route('profile.changeEmail')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="email">
                                    <i class="mr-1 feather-mail"></i>
                                    Your Email
                                </label>
                                <input type="text" name="email" class="form-control" value="<?php echo e(auth()->user()->email); ?>">
                                <?php if ($errors->has("email")) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first("email"); ?>
                                <small class="font-weight-bold text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" required>
                                    <label class="custom-control-label" for="customSwitch3">I'm Sure</label>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="mr-1 feather-refresh-ccw"></i>
                                    Change Email
                                </button>
                            </div>
                        </form>
                    <?php $__env->endSlot(); ?>
                <?php echo $__env->renderComponent(); ?>
             

        </div>

         <div class="col-12 col-md-4">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="mr-1 feather-lock text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Change Password <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>  <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <form action="<?php echo e(route('profile.changePassword')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-lock"></i>
                                Current Password
                            </label>
                            <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                            <?php if ($errors->has("current_password")) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first("current_password"); ?>
                            <small class="font-weight-bold text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="current">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Password
                            </label>
                            <input type="password" name="new_password" class="form-control" id="current" placeholder="New Password">
                            <?php if ($errors->has("new_password")) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first("new_password"); ?>
                            <small class="font-weight-bold text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-check"></i>
                                Confirm Password
                            </label>
                            <input type="password" name="new_confirm_password" class="form-control" id="repeat" placeholder="Confirm Password">
                            <?php if ($errors->has("new_confirm_password")) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first("new_confirm_password"); ?>
                            <small class="font-weight-bold text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2" required>
                                <label class="custom-control-label" for="customSwitch2">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Now
                            </button>
                        </div>
                    </form>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div> 

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/profile/edit.blade.php ENDPATH**/ ?>