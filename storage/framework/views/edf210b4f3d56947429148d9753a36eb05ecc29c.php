<?php $__env->startSection("title"); ?> Edit Adult <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[
        "Adult" => route("adult.index"),
    ]]); ?>
        <?php $__env->slot("last"); ?> Edit Adult <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12 col-xl-10">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Edit Adult <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                    <a href="<?php echo e(route('adult.index')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <div>
                        <form action="<?php echo e(route('adult.update',$adult->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <div class="form-group">
                                        <label for="name">Adult Name</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" id="name" value="<?php echo e($adult->name); ?>" placeholder="Adult Name">
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
                                    <div class="form-group d-flex flex-wrap mb-0">
                                        
                                        <div class="col-md-6 pl-lg-0 pl-md-0 ">
                                            <div class="form-group">
                                                <label for="type">Adult Type</label>
                                                <input required type="text" class="form-control <?php if ($errors->has('type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('type'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="type" id="type" value="<?php echo e($adult->type); ?>" placeholder="Adult Type">
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
endif; ?>" name="updated" id="updated" value="<?php echo e($adult->updated); ?>" placeholder="Updated">
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
                                        </div>
                                        <div class="col-md-6 pr-lg-0 pr-md-0 ">
                                            <div class="form-group">
                                                <label for="count">View Count</label>
                                                <input required type="text" class="form-control <?php if ($errors->has('count')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('count'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="count" id="count" value="<?php echo e($adult->count); ?>" placeholder="Adult Type">
                                                <?php if ($errors->has('count')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('count'); ?>
                                                <small class="invalid-feedback font-weight-bold" role="alert">
                                                    <?php echo e($message); ?>

                                                </small>
                                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                            </div>
                                          
                                            
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="size">Size</label>
                                            <input required type="text" class="form-control <?php if ($errors->has('size')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('size'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="size" id="size" value="<?php echo e($adult->size); ?>" placeholder="Size">
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
                                        <div class="form-group col-md-6">
                                            <label for="requirement">Requirement</label>
                                            <input required type="text" class="form-control <?php if ($errors->has('requirement')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('requirement'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="requirement" id="requirement" value="<?php echo e($adult->requirement); ?>" placeholder="Requirement">
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
                                        <div class="form-group col-md-6">
                                            <label for="version">Version</label>
                                            <input required type="text" class="form-control <?php if ($errors->has('version')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('version'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="version" id="version" value="<?php echo e($adult->version); ?>" placeholder="Version">
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

                                        <div class="form-group col-md-6">
                                            <label for="developer">Developer Company</label>
                                            <input required type="text" class="form-control <?php if ($errors->has('developer')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('developer'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="developer" id="developer" value="<?php echo e($adult->developer); ?>" placeholder="Developer Company">
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
                                    </div>                                 
                                    <div class="form-group">
                                        <!--<label for="link3">Download Apk</label>-->
                                         <input type="text" class="form-control <?php if ($errors->has('name_1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name_1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name_1" id="name_1" value="<?php echo e($adult->name_1); ?>" placeholder="d">
                                        
                                        <input type="text" class="form-control mt-1 <?php if ($errors->has('link1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="link1" id="link1" value="<?php echo e($adult->link1); ?>" placeholder="မထည့်လည်းရပါတယ်">
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
                                        <!--<label for="link2">Download Obb</label>-->
                                         <input type="text" class="form-control <?php if ($errors->has('name_2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name_2'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name_2" id="name_2" value="<?php echo e($adult->name_2); ?>" placeholder="d">
                                        
                                        <input type="text" class="form-control mt-1 <?php if ($errors->has('link2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link2'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="link2" id="link2" value="<?php echo e($adult->link2); ?>" placeholder="မရှိရင်ထည့်စရာမလိုပါ">
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
                                        <!--<label for="link3">Download Apk</label>-->
                                         <input type="text" class="form-control <?php if ($errors->has('name_3')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name_3'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name_3" id="name_3" value="<?php echo e($adult->name_3); ?>" placeholder="d">
                                        
                                        <input type="text" class="form-control mt-1 <?php if ($errors->has('link3')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link3'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="link3" id="link3" value="<?php echo e($adult->link3); ?>" placeholder="မထည့်လည်းရပါတယ်">
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

                                <div class="col-md-6 form-group">
                                    <div class="form-group">
                                        <label for="features">Mod Features</label>
                                        <textarea rows="9" required class="form-control <?php if ($errors->has('features')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('features'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="features"  id="features"><?php echo $adult->features; ?></textarea>
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
                                        <textarea rows="26" required class="form-control <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="description"  id="description"><?php echo $adult->description; ?></textarea>
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

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Update Adult</button>
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

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/adult/edit.blade.php ENDPATH**/ ?>