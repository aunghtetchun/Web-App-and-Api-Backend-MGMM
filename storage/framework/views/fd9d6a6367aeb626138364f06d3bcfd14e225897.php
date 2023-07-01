<?php $__env->startSection("title"); ?> Game List <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[

    ]]); ?>
        <?php $__env->slot("last"); ?> Game List <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Game List <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                    <a href="<?php echo e(route('post.create')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-plus fa-fw"></i>
                    </a>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <div class="table-responsive">
                        <table class="table  table-hover mb-0 table-hover">
                            <thead>
                            <tr>
                                
                                <th  scope="col">Ads</th>
                                <th scope="col">Link</th>
                                <th scope="col">Position</th>
                                <th scope="col">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr >
                                    
                                    <td >
                                        <div class="p-0">
                                            <a class="venobox" data-gall="myGallery" href="<?php echo e(asset("/storage/ads/".$a->photo)); ?>">
                                                <img class="w-100 border border-danger rounded" src="<?php echo e(asset("/storage/ads/".$a->photo)); ?>" alt="" style="height: 50px;">
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?php echo e($a->link); ?>" class="btn btn-outline-primary btn-sm mt-1"> <i class="feather-link"></i> Click</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn disabled btn-outline-success btn-sm mt-1">

                                            <?php if($a->type==1): ?>
                                                <i class="feather-arrow-up"></i>
                                                Top
                                            <?php elseif($a->type==2): ?>
                                                <i class="feather-arrow-left"></i>
                                                Middle
                                            <?php else: ?>
                                                <i class="feather-arrow-down"></i>
                                                Bottom
                                            <?php endif; ?>

                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-inline-flex">
                                            <a href="<?php echo e(route('ads.edit',$a->id)); ?>" class="btn mr-2 btn-outline-warning btn-sm">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('ads.destroy',$a->id)); ?>"  method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field("DELETE"); ?>
                                                <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                    <i class="feather-trash-2"></i>
                                                </button>
                                            </form>

                                        </div>

                                    </td>

                                    <td><?php echo e($a->created_at->diffForHumans()); ?></td>
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
<?php $__env->startSection("foot"); ?>
    <script>
        $(".table").dataTable({
            "order": [[0, "desc" ]]
        });
        $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").parent().addClass("px-0");
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/ads/index.blade.php ENDPATH**/ ?>