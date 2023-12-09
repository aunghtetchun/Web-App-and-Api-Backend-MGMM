<?php $__env->startSection("title"); ?> Adult Games List <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent("component.breadcrumb",["data"=>[

]]); ?>
<?php $__env->slot("last"); ?> Adult Games List <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-12">
        <?php $__env->startComponent("component.card"); ?>
        <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Adult Games List <?php $__env->endSlot(); ?>
        <?php $__env->slot('button'); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('body'); ?>
        <div class="table-responsive">
            <table class="table  table-hover mb-0">
                <thead>
                    <tr>
                        
                        <th scope="col">id</th>
                        <th scope="col">Logo</th>
                        <th scope="col">နာမည်</th>
                        <th scope="col">Link </th>
                        <th scope="col">Controls</th>
                        <th scope="col">Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $adults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="width: 14px;"> <?php echo e($s->id); ?></td>
                        <td style="width: 55px;"> <img class=" " style="width:57px;" src="<?php echo e($s->logo); ?>" /></td>
                        <td><?php echo e($s->name); ?>

                        <td class="justify-content-around">
                                        <?php if(isset($s->link1)): ?>
                                            <?php if(str_contains($s->link1, 'drive.google')): ?>
                                                <a target="_blank" href="<?php echo e($s->link1); ?>" class="btn btn-primary btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                    <span class="badge badge-light">1</span>
                                                </a>
                                                <?php else: ?>
                                                <a target="_blank" href="<?php echo e($s->link1); ?>" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                    <span class="badge badge-light">1</span>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(isset($s->link2)): ?>
                                                <?php if(str_contains($s->link2, 'drive.google')): ?>
                                                    <a target="_blank" href="<?php echo e($s->link2); ?>" class="btn btn-success btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">2</span>
                                                    </a>
                                                <?php else: ?>
                                                    <a target="_blank" href="<?php echo e($s->link2); ?>" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">2</span>
                                                    </a>
                                                <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(isset($s->link3)): ?>
                                                <?php if(str_contains($s->link3, 'drive.google')): ?>
                                                    <a target="_blank" href="<?php echo e($s->link3); ?>" class="btn btn-danger btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">3</span>
                                                    </a>
                                                <?php else: ?>
                                                    <a target="_blank" href="<?php echo e($s->link3); ?>" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">3</span>
                                                    </a>
                                                <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                        <td>
                            <div class="d-inline-flex">
                                <form action="<?php echo e(route('adult.destroy',$s->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field("DELETE"); ?>
                                    <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                        <i class="feather-trash-2"></i>
                                    </button>
                                </form>
                                <a target="" href="<?php echo e(route('adult.edit',$s->id)); ?>" class="btn ml-2 btn-outline-warning btn-sm">
                                    <i class="feather-edit"></i>
                                </a>
                            </div>

                        </td>
                        <td><?php echo e($s->created_at->diffForHumans()); ?></td>
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
        "order": [
            [0, "desc"]
        ]
    });
    $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").parent().addClass("px-0");
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/adult/index.blade.php ENDPATH**/ ?>