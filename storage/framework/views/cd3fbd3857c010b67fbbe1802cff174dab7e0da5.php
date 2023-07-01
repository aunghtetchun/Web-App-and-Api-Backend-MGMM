<?php $__env->startSection("title"); ?> Edit Ads <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[
        "Ads" => route("post.index"),
    ]]); ?>
        <?php $__env->slot("last"); ?> Edit Ads <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12 col-xl-6">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Edit Ads <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                    <a href="<?php echo e(route('post.index')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <div>
                        <form action="<?php echo e(route('ads.update',$ad->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for="link">Ads Link</label>
                                <input required type="text" class="form-control <?php if ($errors->has('link')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="link" id="link" value="<?php echo e($ad->link); ?>" placeholder="Ads Link">
                                <?php if ($errors->has('link')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link'); ?>
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    <?php echo e($message); ?>

                                </small>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="type">Ads Type</label>

                                <select class="form-select  form-control" name="type" id="type"  aria-label="Default select">
                                    <option disabled>Choose Ads Type</option>
                                    <option value="1" <?php echo e($ad->type == 1 ? "selected":""); ?>>Top</option>
                                    <option value="2" <?php echo e($ad->type == 2 ? "selected":""); ?>>Middle</option>
                                    <option value="3" <?php echo e($ad->type == 3 ? "selected":""); ?>>Bottom</option>
                                </select>
                                <?php if ($errors->has('type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('type'); ?>
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    <?php echo e($message); ?>

                                </small>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="form-group justify-content-center align-items-center">
                                <label for="photo" >Ads Image</label>

                                <input type="file" accept="image/png, .jpeg, .jpg, image/gif" class="form-control d-none  p-1 <?php if ($errors->has('photo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('photo'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="photo" id="photo" value="<?php echo e(old('photo')); ?>" placeholder="Ads Logo" onchange="readURL(this);">

                                <?php if ($errors->has('photo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('photo'); ?>
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    <?php echo e($message); ?>

                                </small>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                <img id="blah" onclick="$('#photo').trigger('click');" class="w-100 rounded" src="<?php echo e(asset("/storage/ads/".$ad->photo)); ?>" alt="your image" />
                                <a onclick="$('#photo').trigger('click');" class="btn text-white btn-primary btn-sm" style="margin-top: -84px; margin-left: 6px">
                                    <i class="fas fa-edit "></i>
                                </a>
                            </div>

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Update Ads</button>
                        </form>
                    </div>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/ads/edit.blade.php ENDPATH**/ ?>