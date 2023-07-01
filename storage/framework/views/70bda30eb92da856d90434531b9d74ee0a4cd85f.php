<?php $__env->startSection("title"); ?> Add Software <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[
        "Software" => route("software.index"),
    ]]); ?>
        <?php $__env->slot("last"); ?> Add Software <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12 col-xl-10">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Add Software <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                    <a href="<?php echo e(route('software.index')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <div>
                        <form action="<?php echo e(route('software.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-row justify-content-between ">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="name">Software Name</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="Software Name">
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
                                        <label for="type">Software Type</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('type'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="type" id="type" value="Offline" placeholder="Software Type">
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
                                   
                                    <div class="form-group">
                                        <label for="updated">Updated</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('updated')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('updated'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="updated" id="updated" value="<?php echo e(old('updated')); ?>" placeholder="Updated">
                                        <?php if ($errors->has('updated')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('updated'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="size">Size</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('size')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('size'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="size" id="size" value="<?php echo e(old('size')); ?>" placeholder="Size">
                                        <?php if ($errors->has('size')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('size'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="version">Version</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('version')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('version'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="version" id="version" value="<?php echo e(old('version')); ?>" placeholder="Version">
                                        <?php if ($errors->has('version')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('version'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="requirement">Requirement</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('requirement')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('requirement'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="requirement" id="requirement" value="Android 6.0" placeholder="Requirement">
                                        <?php if ($errors->has('requirement')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('requirement'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="developer">Developer Company</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('developer')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('developer'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="developer" id="developer" value="<?php echo e(old('developer')); ?>" placeholder="Developer Company">
                                        <?php if ($errors->has('developer')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('developer'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                   
                                    <div class="form-group">
                                        <!-- <label for="link1">Link One</label> -->
                                        <input type="text" class="form-control <?php if ($errors->has('name_1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name_1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name_1" id="name_1" value="Download Mod Apk" placeholder="Download Mod Apk">
                                        
                                        <input type="text" class="form-control mt-1 <?php if ($errors->has('link1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="link1" id="link1" value="<?php echo e(old('link1')); ?>" placeholder="မရှိရင်မထည့်လည်းရပါတယ်">
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
                                    <div class="form-group">
                                        <!-- <label for="link2">Link Two</label> -->
                                        <input type="text" class="form-control <?php if ($errors->has('name_2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name_2'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name_2" id="name_2" value="Download Obb" placeholder="Download Obb">
                                        
                                        <input type="text" class="form-control mt-1 <?php if ($errors->has('link2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link2'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="link2" id="link2" value="<?php echo e(old('link2')); ?>" placeholder="မရှိရင်မထည့်လည်းရပါတယ်">
                                        <?php if ($errors->has('link2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link2'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="link3">Link Three</label> -->
                                        <input type="text" class="form-control <?php if ($errors->has('name_3')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name_3'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name_3" id="name_3" value="Download Original Apk" placeholder="Download Original Apk">
                                        
                                        <input type="text" class="form-control mt-1 <?php if ($errors->has('link3')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link3'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="link3" id="link3" value="<?php echo e(old('link3')); ?>" placeholder="မရှိရင်မထည့်လည်းရပါတယ်">
                                        <?php if ($errors->has('link3')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link3'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>

                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group justify-content-center align-items-center">
                                        <label for="logo">Software Logo</label>
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
                                        <label class="active" for="images">Software Photos</label>
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
                                        <label for="features">Mod Features</label>
                                        <textarea rows="9" required class="form-control <?php if ($errors->has('features')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('features'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="features"  id="features"><?php echo e(old('features')); ?></textarea>
                                        <?php if ($errors->has('features')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('features'); ?>
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

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Software</button>
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
        $('#description').summernote({
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/software/create.blade.php ENDPATH**/ ?>