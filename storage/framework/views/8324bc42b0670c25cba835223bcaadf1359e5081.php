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
                <?php $__env->slot('title'); ?> Popular List <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                    <a href="<?php echo e(route('popular.index')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i> All
                    </a>

                        <a href="<?php echo e(route('popular.create')); ?>" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus fa-fw"></i> Add Popular
                        </a>







                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <div class="table-responsive">
                        <table class="table  table-hover mb-0 table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Title</th>
                                <th scope="col">Name</th>
                                <th scope="col">Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $populars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr >
                                    <th scope="row"><?php echo e($p->id); ?></th>
                                    <td>
                                        <img class="rounded mr-2 border border-danger" src="<?php echo e(asset("/storage/logo/".$p->logo)); ?>" alt="" style="width: 45px;">
                                    </td>
                                    <td >
                                        <div class="d-inline-flex">
                                            <div class="d-flex align-items-center">
                                                <?php echo e(Str::words($p->title,5, '...')); ?>

                                            </div>
                                        </div>

                                    </td>
                                    <td><a target="_blank" href="<?php echo e($p->link); ?>" class="btn btn-primary btn-sm"><?php echo e($p->name); ?></a>
                                    </td>
                                    <td>
                                        <div class="d-inline-flex">



                                            <form action="<?php echo e(route('popular.destroy',$p->id)); ?>"  method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field("DELETE"); ?>
                                                <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                    <i class="feather-trash-2"></i>
                                                </button>
                                            </form>



                                        </div>




                                    </td>

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

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/popular/index.blade.php ENDPATH**/ ?>