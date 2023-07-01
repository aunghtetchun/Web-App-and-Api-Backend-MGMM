<?php $__env->startSection("title"); ?> See Game <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[
        "Game" => "#",
    ]]); ?>
        <?php $__env->slot("last"); ?> See Game <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/software/show.blade.php ENDPATH**/ ?>