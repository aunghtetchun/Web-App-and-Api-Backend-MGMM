<?php $__env->startSection("title"); ?> Game Search History <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent("component.breadcrumb",["data"=>[

]]); ?>
<?php $__env->slot("last"); ?> Game Search History <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-12" >
        <?php $__env->startComponent("component.card"); ?>
        <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Game Search History <?php $__env->endSlot(); ?>
        <?php $__env->slot('button'); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('body'); ?>
        <div style="overflow:scroll">
                <table class="table table-bordered table-hover mb-0" style="overflow:scroll">
                    <thead>
                    <tr>
                        <th scope="col">ရှာသည့်အကြိမ်ရေ</th>
                        <th scope="col">ရှာသည့်စာသား</th>
                       <th scope="col">တွေ့သည့်ဂိမ်းအရေအတွက်</th>
                       <th scope="col">ရှာသည့်အချိန်</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $searchKeywords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td scope="row"><?php echo e(App\SearchKeyword::where('keywords', 'LIKE', "%{$p->keywords}%")->count()); ?> ကြိမ်</td>
                            <td><?php echo e($p->keywords); ?></td>
                            <td ><?php echo e(App\Post::where('name', 'LIKE', "%{$p->keywords}%")->count()); ?> ဂိမ်း</td>
                            <td><?php echo e($p->created_at->diffForHumans()); ?></td>
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

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/viewer/viewer.blade.php ENDPATH**/ ?>