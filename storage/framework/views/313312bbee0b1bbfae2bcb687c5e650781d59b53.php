<?php $__env->startSection("title"); ?> Category Page <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[
        "Category" => "category.category",
    ]]); ?>
        <?php $__env->slot("last"); ?>  <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <?php if(auth()->user()->id==3): ?>
        <div class="col-12 col-md-9">
            <?php if(isset($category)): ?>
                <?php $__env->startComponent("component.card"); ?>
                    <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                    <?php $__env->slot('title'); ?> Edit Category <?php $__env->endSlot(); ?>
                    <?php $__env->slot('button'); ?>  <?php $__env->endSlot(); ?>
                    <?php $__env->slot('body'); ?>
                        <div>
                            <form action="<?php echo e(route('category.update',$category->id )); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="form-row align-items-end">
                                    <div class="col-12 col-md-6">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="title" id="title" value="<?php echo e($category->title); ?>" placeholder="Title">
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
                                    <!-- <div class="col-12 col-md-2">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" id="password" placeholder="Password">
                                        <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div> -->
                                    <div class="col-12 col-md-4">
                                        <button type="submit" class="btn btn-primary form-control" ><i class="fas fa-plus-square mr-1"></i> Update Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php $__env->endSlot(); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php else: ?>
                <?php $__env->startComponent("component.card"); ?>
                    <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                    <?php $__env->slot('title'); ?> Add Category <?php $__env->endSlot(); ?>
                    <?php $__env->slot('button'); ?>  <?php $__env->endSlot(); ?>
                    <?php $__env->slot('body'); ?>
                        <div>
                            <form action="<?php echo e(route('category.store')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-row align-items-end">
                                    <div class="col-12 col-md-6">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="title" id="title" value="<?php echo e(old('title')); ?>" placeholder="Title">
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
                                    <!-- <div class="col-12 col-md-2">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" id="password" placeholder="Password">
                                        <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div> -->
                                    <div class="col-12 col-md-4">
                                        <button type="submit" class="btn btn-primary form-control" ><i class="fas fa-plus-square mr-1"></i> Add Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php $__env->endSlot(); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="col-12 col-md-9">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Category List <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?> <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                        <div class="table-responsive">
                            <table class="table  table-hover mb-0 table-hover">
                                <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = \App\Category::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($c->id); ?></th>
                                    <td><?php echo e($c->title); ?></td>
                                    <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                        <a href="<?php echo e(route('category.edit',$c->id)); ?>" class="btn mr-2 btn-outline-warning btn-sm">
                                            <i class="feather-edit"></i>
                                        </a>
                                    </td>
                                    <td><?php echo e($c->created_at); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/category/category.blade.php ENDPATH**/ ?>