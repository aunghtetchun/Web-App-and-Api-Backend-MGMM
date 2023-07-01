<?php $__env->startSection("title"); ?> Add Popular <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[
        "Popular" => route("post.index"),
    ]]); ?>
        <?php $__env->slot("last"); ?> Add Popular <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12 col-xl-6">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Add Popular <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                    <a href="<?php echo e(route('popular.index')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <div>
                        <form action="<?php echo e(route('popular.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-row justify-content-between ">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <textarea rows="9" required class="form-control <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="title"  id="title"><?php echo e(old('title')); ?></textarea>
                                        <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Link Name</label>
                                        <input type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="Link One">
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
                                        <label for="link1">Link</label>
                                        <input type="text" class="form-control <?php if ($errors->has('link1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="link1" id="link1" value="<?php echo e(old('link1')); ?>" placeholder="Link One">
                                        <?php if ($errors->has('link1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link1'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group justify-content-center align-items-center">
                                        <label for="logo"> Logo</label>
                                        <input  required type="file" accept="image/png, .jpeg, .jpg,image/webp, image/gif" class="form-control d-none  p-1 <?php if ($errors->has('logo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('logo'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="logo" id="logo" value="<?php echo e(old('logo')); ?>" placeholder="Ads Logo" onchange="readURL(this);">
                                        <?php if ($errors->has('logo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('logo'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        <img id="blah" onclick="$('#logo').trigger('click');" class="w-100 rounded" src="<?php echo e(asset('dashboard/images/upload.png')); ?>" alt="your image" />
                                    </div>
                                    <div class="form-group input-field">
                                        <label class="active" for="images"> Photos</label>
                                        <div class="input-images-1" style="padding-top: .5rem;"></div>
                                        
                                        <?php if ($errors->has('images')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('images'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea rows="9" required class="form-control <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="description"  id="description"><?php echo e(old('description')); ?></textarea>
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

                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Popular</button>
                        </form>
                    </div>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>
    <script>
        $('.input-images-1').imageUploader();
        // $('#description').summernote({
        //     height: 200,                 // set editor height
        //     minHeight: null,             // set minimum height of editor
        //     maxHeight: null,             // set maximum height of editor
        //     focus: true
        // });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/popular/create.blade.php ENDPATH**/ ?>