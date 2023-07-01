<div class="row">
    <div class="col-12">
        <div class="pb-3">
            <a class="text-uppercase" href="<?php echo e(route('home')); ?>"><i class="feather-home"></i></a>
            <span class="mx-2"><i class="fas fa-angle-right"></i></span>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name=>$link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="text-uppercase" href="<?php echo e($link); ?>"><?php echo e($name); ?></a>
                <span class="mx-2"><i class="fas fa-angle-right"></i></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <span class="text-uppercase"><?php echo e($last); ?></span>
        </div>
    </div>
</div>
<?php /**PATH /var/www/modgamesmm/resources/views/component/breadcrumb.blade.php ENDPATH**/ ?>