<?php $__env->startSection("title"); ?> Comment List <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[

    ]]); ?>
        <?php $__env->slot("last"); ?> Comment List <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12 col-md-10">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__env->slot('title'); ?>( <strong> <?php echo e($p->name); ?> </strong> ) အားကွန်မန့်ပေးထားသူများ<?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                        <div class="table-responsive">
                            <table class="table  table-hover mb-0">
                                <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = \App\Comment::where( 'post_id',$p->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($cmt->id); ?></th>
                                    <td><?php echo e($cmt->comment); ?></td>
                                    <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                        <form action="<?php echo e(route('comment.destroy',$cmt->id)); ?>"  method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field("DELETE"); ?>
                                            <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                <i class="feather-trash-2"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td><?php echo e($cmt->created_at->diffForHumans()); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php $__env->endSlot(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/comment/show.blade.php ENDPATH**/ ?>