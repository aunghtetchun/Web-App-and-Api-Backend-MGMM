<?php $__env->startSection("title"); ?>Mod Games Myanmar <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-3 " style="height: 75vh">
       <div class="row justify-content-center">
           <h4 class="col-12 mt-4  text-center " style="line-height: 30px;">Link Repair & Request Game</h4>
           <?php if(isset($finish)): ?>
           <h5 id="finish" class="col-12 text-danger shadow-lg font-weight-bold text-center pb-4" style="line-height: 30px"><?php echo e($finish); ?></h5>
           <?php endif; ?>
           <div class="col-12 col-md-8">
               <form class="text-light pb-3" action="<?php echo e(route('requestGame.storeRequest')); ?>" method="post" enctype="multipart/form-data">
                   <?php echo csrf_field(); ?>
                   <div class="form-group mb-0">
                       <label for="app_name">Game Name</label>
                       <input required type="text" class="form-control" name="app_name" id="app_name" placeholder="Game Name" >
                       <?php if ($errors->has('app_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('app_name'); ?>
                       <small class="invalid-feedback font-weight-bold" role="alert">
                           <?php echo e($message); ?>

                       </small>
                       <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                   </div>
                   <div class="form-group mb-0">
                       <label for="username">Your Name</label>
                       <input required type="text" class="form-control <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="username" id="username" value="<?php echo e(old('username')); ?>" placeholder="Your Name">
                       <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?>
                       <small class="invalid-feedback font-weight-bold" role="alert">
                           <?php echo e($message); ?>

                       </small>
                       <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                   </div>
                   <div class="form-group d-none mb-0">
                       <label for="phone">Phone or Email</label>
                       <input required type="text" class="form-control <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="phone" id="phone" value="09123456789" placeholder="Phone Number or Email">
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
                   <div class="form-group mb-0">
                       <label for="description"> Online? Offline?</label>
                       
                       <input required type="text" class="form-control <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="description" id="description" value="<?php echo e(old('description')); ?>" placeholder="online?  offline?">
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
                   <div class="form-group">
                       <label for="playstore_link">Game Playstore Link or Post link</label>
                       <input required type="text" class="form-control <?php if ($errors->has('playstore_link')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('playstore_link'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="playstore_link" id="playstore_link" value="<?php echo e(old('playstore_link')); ?>" placeholder="ဖုန်းအမျိုးအစား">
                       <?php if ($errors->has('playstore_link')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('playstore_link'); ?>
                       <small class="invalid-feedback font-weight-bold" role="alert">
                           <?php echo e($message); ?>

                       </small>
                       <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                   </div>
                   <button type="submit" class="btn btn-block py-2 text-light" style="background-color: #a81d1d" ><i class="fas fa-plus-square mr-1"></i> Submit</button>
               </form>
           </div>
       </div>
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>
    <script>
        $(document).ready(function() {
            $('#finish').fadeOut(7500);
        });
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('dashboard.game_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/request/create.blade.php ENDPATH**/ ?>