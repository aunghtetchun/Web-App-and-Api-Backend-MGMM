<?php $__env->startSection("title"); ?> Suggest List <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[

    ]]); ?>
        <?php $__env->slot("last"); ?> Suggest List <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Suggest List <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>

                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                        <div class="table-responsive">
                            <table class="table  table-hover mb-0">
                                <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = \App\Suggest::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-nowrap" >
                                        <?php echo e($s->name); ?>

                                    </td>
                                    <td><?php echo e($s->phone); ?></td>
                                    <td >
                                        <div class="d-inline-flex">
                                            <form action="<?php echo e(route('suggest.destroy',$s->id)); ?>"  method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field("DELETE"); ?>
                                                <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                    <i class="feather-trash-2"></i>
                                                </button>
                                            </form>
                                            <a href="<?php echo e(route('suggest.show',$s->id)); ?>" class="btn ml-2 btn-outline-success btn-sm">
                                                <i class="feather-eye"></i>
                                            </a>
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

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/suggest/index.blade.php ENDPATH**/ ?>