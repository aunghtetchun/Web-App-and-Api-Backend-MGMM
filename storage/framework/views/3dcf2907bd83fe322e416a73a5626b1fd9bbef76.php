<?php $__env->startSection("title"); ?> See Game <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[
        "Game" => "#",
    ]]); ?>
        <?php $__env->slot("last"); ?> See Game <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-12 col-md-11 col-lg-9">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="fa-fw feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Game <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                    <a href="<?php echo e(route('post.index')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fa-fw fas fa-list fa-fw"></i>
                    </a>
                    <a href="<?php echo e(route('post.edit',$post->id)); ?>" class="btn  btn-outline-warning btn-sm">
                        <i class="fa-fw feather-edit"></i>
                    </a>
                    <form class="d-inline-block" action="<?php echo e(route('post.destroy',$post->id)); ?>"  method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                        <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                            <i class="fa-fw feather-trash-2"></i>
                        </button>
                    </form>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <div class="card-body">
                        <?php if(isset($post)): ?>
                            <div class="d-flex flex-wrap justify-content-around ">
                                <div class="col-3 col-xs-12 col-md-2 px-0 my-3">
                                    <img class="rounded" src="<?php echo e(asset("/storage/logo/".$post->logo)); ?>" style="width: 100%;  margin-bottom: 5px;" alt="">
                                </div>
                                <div class="col-9 col-md-10 text-center my-3">
                                    <h4 class="font-weight-bold"><?php echo e($post->name); ?></h4>
                                    <div class="star pt-4"  style="font-size: 30px; color: #ffd208">
                                        <?php for($i=1; $i<=5; $i++): ?>
                                            <?php if($i<=floor(collect($post->getRating->pluck('rating'))->avg()) ): ?>
                                                <i class="fas fa-star fa-fw"></i>
                                            <?php else: ?>
                                                <i class="far fa-star fa-fw"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <div class="col-12 my-3">
                                    <div class="d-flex flex-wrap justify-content-center align-items-center">
                                        <div class="col-6 px-0 col-md-4 col-lg-4">
                                            <b class="font-weight-bolder">Developer</b>
                                            <p><?php echo e($post->developer); ?></p>
                                        </div>
                                        <div class="col-6 px-0 col-md-4 col-lg-4">
                                            <b class="font-weight-bolder">Updated</b>
                                            <p><?php echo e($post->updated); ?></p>
                                        </div>
                                        <div class="col-6 px-0 col-md-4 col-lg-4">
                                            <b class="font-weight-bolder">Size</b>
                                            <p><?php echo e($post->size); ?></p>
                                        </div>
                                        <div class="col-6 px-0 col-md-4 col-lg-4">
                                            <b class="font-weight-bolder">Version</b>
                                            <p><?php echo e($post->version); ?></p>
                                        </div>
                                        <div class="col-6 px-0 col-md-4 col-lg-4">
                                            <b class="font-weight-bolder">Requirements</b>
                                            <p><?php echo e($post->requirement); ?></p>
                                        </div>
                                        <div class="col-6 px-0 col-md-4 col-lg-4">
                                            <b class="font-weight-bolder">Type</b>
                                            <p><?php echo e($post->type); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-right mt-3 d-flex flex-wrap justify-content-end">
                                        <div class="col-12 col-md-4">
                                            <a href="<?php echo e($post->link1); ?>" class="btn btn-block btn-primary mb-2"><i class="fas feather-arrow-down"></i> Download</a>
                                        </div>
                                        <?php if(isset($post->link2)): ?>
                                        <div class="col-12 col-md-4">

                                                <a href="<?php echo e($post->link2); ?>" class="btn btn-block btn-success mb-2"><i class="fas feather-arrow-down"></i> Download</a>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(isset($post->link3)): ?>
                                        <div class="col-12 col-md-4">
                                               <a href="<?php echo e($post->link3); ?>" class="btn btn-block btn-danger mb-2"><i class="fas feather-arrow-down"></i> Download</a>
                                       </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex flex-wrap g_img">
                                <h4 class="col-12 font-weight-bolder text-center my-4">Gameplay Photo</h4>
                            <?php $__currentLoopData = $post->getPhoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="p-2 col-12 col-md-4">
                                        <a class="venobox" data-gall="myGallery" href="<?php echo e(asset("/storage/post/".$photo->name)); ?>">
                                            <img class="w-100 rounded" src="<?php echo e(asset("/storage/post/".$photo->name)); ?>" alt="" >
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 text-center my-4">
                                        <h4 class="col-12 font-weight-bolder my-4">Gameplay Video</h4>
                                        <iframe width="100%" height="333px" src="https://www.youtube.com/embed/<?php echo $post->video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                    </div>
                                    <div class="col-12">
                                        <h4 class="col-12 font-weight-bolder my-4 text-center">Game Description</h4>
                                        <?php echo $post->description; ?>

                                    </div>
                                <div class="col-12">
                                    <h4 class="col-12 font-weight-bolder text-center my-4">Mod Features</h4>
                                    <?php echo $post->features; ?>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/post/show.blade.php ENDPATH**/ ?>