<?php $__env->startSection("title"); ?> Message List <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[

    ]]); ?>
        <?php $__env->slot("last"); ?> Message List <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    

    <div class="row">
        <div class="col-12">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Message List <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                    <a href="<?php echo e(route('post.index')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i> All
                    </a>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <div class="table-responsive">
                        <table class="table  table-hover mb-0 table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th  scope="col">နာမည်</th>
                                <th scope="col">ဖုန်းနံပါတ်</th>
                                <th scope="col">မက်ဆေ့</th>
                                <th scope="col">Created At</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = App\Message::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr >
                                    <th scope="row"><?php echo e($p->id); ?></th>
                                 <?php if(isset($p->getUser)): ?>
                                    <td><?php echo e($p->getUser->name); ?></td>
                                    <td><?php echo e($p->getUser->email); ?></td>
                                    <td><?php echo e($p->message); ?></td>
                                    <td><?php echo e($p->created_at->diffForHumans()); ?></td>
                                <?php endif; ?>
                                    

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

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/user/message.blade.php ENDPATH**/ ?>