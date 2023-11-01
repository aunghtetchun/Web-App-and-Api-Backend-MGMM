<?php $__env->startSection("title"); ?> Account List <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[

    ]]); ?>
        <?php $__env->slot("last"); ?> Account List <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Account List <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                    <a href="<?php echo e(route('skin.index')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i> All
                    </a>
                        
                        <a href="<?php echo e(route('skin.create')); ?>" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus fa-fw"></i> Add Account
                        </a>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <div class="table-responsive">
                        <table class="table  table-hover mb-0 table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ရောင်းသူ</th>
                                <th scope="col">Id</th>
                                <th scope="col">Server ID</th>
                                <th scope="col">Price</th>
                                <th scope="col">အမျိုးအစား</th>
                                <th scope="col">Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr >
                                    <th scope="row"><?php echo e($p->id); ?></th>
                                    <th ><?php echo e(App\Seller::find($p->seller_id)->name); ?></th>
                                    <td><?php echo e($p->game_id); ?></td>                                    
                                    <td>( <?php echo e($p->server_id); ?> )</td>                                    
                                    <td><?php echo e($p->price); ?> KS</td>                                    
                                    <td>
                                        <p class="badge badge-pill badge-success p-2"><?php echo e($p->type); ?></p>
                                    </td>                                   
                                    <td>
                                        <div class="d-inline-flex">
                                            <a target="" href="<?php echo e(route('account.edit',$p->id)); ?>" class="btn mr-2 btn-outline-warning btn-sm">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('account.destroy',$p->id)); ?>"  method="post">
                                               <?php echo csrf_field(); ?>
                                               <?php echo method_field("DELETE"); ?>
                                               <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                   <i class="feather-trash-2"></i>
                                               </button>
                                            </form> 
                                            <a target="_blank" href="<?php echo e(route('account.show',$p->id)); ?>" class="btn ml-2 btn-outline-success btn-sm">
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

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/account/index.blade.php ENDPATH**/ ?>