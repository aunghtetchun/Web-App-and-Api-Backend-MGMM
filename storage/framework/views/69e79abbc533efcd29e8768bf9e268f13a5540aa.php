<?php $__env->startSection("title"); ?> Add Game <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[
        "Crawler" => route("scraper.gameList"),
    ]]); ?>
        <?php $__env->slot("last"); ?> Add Game <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12 col-xl-5">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Add Game <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                    <a href="<?php echo e(route('scraper.gameList')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <div>
                        <form action="<?php echo e(route('scraper.storeGame')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-row justify-content-between ">
                                <div class="form-group col-12">
                                    <div class="form-group">
                                        <label for="url">Game URL</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('url')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('url'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="url" id="url" value="<?php echo e(old('url')); ?>" placeholder="">
                                        <?php if ($errors->has('url')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('url'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <select name="website" id="website" class="form-control select2">
                                            <option selected disabled>Select Website</option>
                                                <option value="https://apkaward.com/">Apkaward</option>
                                                <option value="https://modyolo.com/">Modyolo</option>
                                                <option value="https://an1.com/">AN1</option>
                                                <option value="https://rexdl.com/">Rexdl</option>
                                                <option value="https://revdl.com/">RevDL</option>
                                        </select>
                                        <?php if ($errors->has('website')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('website'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="tag_id">Select Tags</label>
                                        <select name="tag_id[]" id="tag_id" class="form-control select2" multiple="multiple">
                                            <?php $__currentLoopData = \App\Category::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c->id); ?>" ><?php echo e($c->title); ?></option>
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
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id" class="form-control select2">
                                            <option selected disabled>Select Category</option>
                                            <?php $__currentLoopData = \App\Category::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c->id); ?>"><?php echo e($c->title); ?></option>
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
                                        <label for="video">Gameplay Video</label>
                                        <input required type="text"col-md-6 value="#" class="form-control <?php if ($errors->has('video')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('video'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="video" id="video" value="<?php echo e(old('video')); ?>" placeholder="Gameplay Video">
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
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Game</button>
                        </form>
                    </div>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>
    <script>
       
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/crawler/create.blade.php ENDPATH**/ ?>