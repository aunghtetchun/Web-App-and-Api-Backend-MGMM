<?php $__env->startSection("title"); ?> Game & Software Zone Myanmar <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <div class="row justify-content-center border border-dark" style="background: rgba(11,15,18,0.6); ">
            <h2 class="col-12 mt-4 mb-2 pb-4 pt-3 text-center text-white " style="line-height: 53px;">Suggest Our Website Design</h2>
            <?php if(isset($finish)): ?>
                <h5 id="finish" class="col-12 text-danger shadow-lg font-weight-bold text-center pb-4" style="line-height: 30px"><?php echo e($finish); ?></h5>
            <?php endif; ?>
            <div class="col-12 col-md-8">
                <form class="text-light pb-5" action="<?php echo e(route('suggestGame.storeSuggest')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input required type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="your name">
                        <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                        <small class="invalid-feedback font-weight-bold" role="alert">
                            <?php echo e($message); ?>

                        </small>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="phone">Your Phone Number</label>
                        <input required type="text" class="form-control <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="phone" id="phone" value="<?php echo e(old('phone')); ?>" placeholder="phone number">
                        <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?>
                        <small class="invalid-feedback font-weight-bold" role="alert">
                            <?php echo e($message); ?>

                        </small>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input required type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" id="email" value="<?php echo e(old('email')); ?>" placeholder="email address">
                        <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                        <small class="invalid-feedback font-weight-bold" role="alert">
                            <?php echo e($message); ?>

                        </small>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="description">Your Suggest</label>
                        <textarea required name="description" id="description" class="form-control <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="description" id=""  rows="7"><?php echo e(old('description')); ?></textarea>
                        <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?>
                        <small class="invalid-feedback font-weight-bold" role="alert">
                            <?php echo e($message); ?>

                        </small>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <button type="submit" class="btn btn-block text-light py-2" style="background-color: #a81d1d" ><i class="fas fa-plus-square mr-1"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>
    <script>
        $(document).ready(function() {
            $('#finish').fadeOut(7000);
        });
    </script>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('dashboard.game_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/suggest/create.blade.php ENDPATH**/ ?>