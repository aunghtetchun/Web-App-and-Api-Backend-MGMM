<?php $__env->startSection("title"); ?> Edit Game <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[
        "Game" => route("post.index"),
    ]]); ?>
        <?php $__env->slot("last"); ?> Edit Game <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12 col-xl-10">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Edit Game <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                    <a href="<?php echo e(route('post.index')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <div>
                        <form action="<?php echo e(route('post.update',$post->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <div class="form-group">
                                        <label for="name">Game Name</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" id="name" value="<?php echo e($post->name); ?>" placeholder="Game Name">
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
                                        <label for="keywords">Search Keywords</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('keywords')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('keywords'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="keywords" id="keywords" value="<?php echo e($post->keywords); ?>" placeholder="search keywords">
                                        <?php if ($errors->has('keywords')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('keywords'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="tag_id">Category</label>
                                        <select name="tag_id[]" id="tag_id" class="form-control select2" multiple="multiple">
                                            
                                            <?php $__currentLoopData = \App\Category::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($option->id); ?>" 
                                                <?php echo e(\App\Post_category::where('post_id', $post->id)->where('category_id', $option->id)->exists() ? 'selected' : ''); ?>>
                                                <?php echo e($option->title); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if ($errors->has('tag_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tag_id'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group d-flex flex-wrap mb-0">
                                        <div class="form-group col-md-6 pl-lg-0 pl-md-0">
                                            <div class="form-group justify-content-center align-items-center">
                                                <label for="logo" class="">Game Logo</label>
                                                <input type="file" accept="image/png, .jpeg, .jpg, image/gif,image/webp" class="form-control d-none  p-1 <?php if ($errors->has('logo')) :
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
                                                <a onclick="$('#logo').trigger('click');" class="btn text-white btn-primary btn-sm" style="position:absolute; right: 22px; top: 42px">
                                                    <i class="fas fa-edit "></i>
                                                </a>
                                                <img id="blah" onclick="$('#logo').trigger('click');" class="w-100 rounded" src="<?php echo e(asset("/storage/logo/".$post->logo)); ?>" alt="your image" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-lg-0 pr-md-0 ">
                                            <div class="form-group">
                                                <label for="type">Game Type</label>
                                                <input required type="text" class="form-control <?php if ($errors->has('type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('type'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="type" id="type" value="<?php echo e($post->type); ?>" placeholder="Game Type">
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
                                                <label for="category_id">Category</label>
                                                <select name="category_id" id="category_id" class="form-control select2">
                                                    <option selected disabled>Select Category</option>
                                                    <?php $__currentLoopData = \App\Category::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($c->id); ?>" <?php echo e($post->category_id == $c->id ? "selected":""); ?> ><?php echo e($c->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if ($errors->has('category_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('category_id'); ?>
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
endif; ?>" name="updated" id="updated" value="<?php echo e($post->updated); ?>" placeholder="Updated">
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
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="size">Size</label>
                                            <input required type="text" class="form-control <?php if ($errors->has('size')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('size'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="size" id="size" value="<?php echo e($post->size); ?>" placeholder="Size">
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
endif; ?>" name="requirement" id="requirement" value="<?php echo e($post->requirement); ?>" placeholder="Requirement">
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
endif; ?>" name="version" id="version" value="<?php echo e($post->version); ?>" placeholder="Version">
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
endif; ?>" name="developer" id="developer" value="<?php echo e($post->developer); ?>" placeholder="Developer Company">
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
                                        <label for="video">Gameplay Video</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('video')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('video'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="video" id="video" value="<?php echo e($post->video); ?>" placeholder="Gameplay Video">
                                        <?php if ($errors->has('video')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('video'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <!--<label for="link3">Download Apk</label>-->
                                         <input type="text" class="form-control <?php if ($errors->has('name_1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name_1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name_1" id="name_1" value="<?php echo e($post->name_1); ?>" placeholder="d">
                                        
                                        <input type="text" class="form-control mt-1 <?php if ($errors->has('link1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="link1" id="link1" value="<?php echo e($post->link1); ?>" placeholder="မထည့်လည်းရပါတယ်">
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
endif; ?>" name="name_2" id="name_2" value="<?php echo e($post->name_2); ?>" placeholder="d">
                                        
                                        <input type="text" class="form-control mt-1 <?php if ($errors->has('link2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link2'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="link2" id="link2" value="<?php echo e($post->link2); ?>" placeholder="မရှိရင်ထည့်စရာမလိုပါ">
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
endif; ?>" name="name_3" id="name_3" value="<?php echo e($post->name_3); ?>" placeholder="d">
                                        
                                        <input type="text" class="form-control mt-1 <?php if ($errors->has('link3')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('link3'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="link3" id="link3" value="<?php echo e($post->link3); ?>" placeholder="မထည့်လည်းရပါတယ်">
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
endif; ?>" name="features"  id="features"><?php echo $post->features; ?></textarea>
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
endif; ?>" name="description"  id="description"><?php echo $post->description; ?></textarea>
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

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Update Game</button>
                        </form>
                    </div>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-12 col-md-6">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Gameplay Photo <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>

                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <form action="<?php echo e(route('photo.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value="<?php echo e($post->id); ?>" name="post_id">
                        <div class="form-group input-field">

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
                        <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Upload Photos</button>

                    </form>
                    <div class="d-flex mt-3" style="overflow-x: scroll;" >
                        <?php $__currentLoopData = $post->getPhoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mr-2" >
                                <img src="<?php echo e(asset("/storage/post/".$photo->name)); ?>" alt="" >
                                <form action="<?php echo e(route('photo.destroy',$photo->id)); ?>"  method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field("DELETE"); ?>
                                    <button onClick="return confirm('Are you sure you want to delete?')" class="btn  btn-sm btn-danger text-left" style="margin-top: -330px; margin-left: 8px">
                                        <i class="feather-trash-2"></i>
                                    </button>
                                </form>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/post/edit.blade.php ENDPATH**/ ?>