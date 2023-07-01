<?php $__env->startSection("title"); ?> Comment List <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[

    ]]); ?>
        <?php $__env->slot("last"); ?> Comment List <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    

    <div class="row">
        <div class="col-12">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Comment List <?php $__env->endSlot(); ?>
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
                                <th  scope="col">ကွန်မန့်</th>
                                <th scope="col">ဂိမ်း</th>
                                <th scope="col">Link</th>
                                <th scope="col">Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = App\Comment::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($p->getPost): ?>

                                <tr >
                                    <th scope="row"><?php echo e($p->id); ?></th>
                                 
                                    <td><?php echo e($p->comment); ?>

                                    </td>
                                        <td><?php echo e($p->getPost->name); ?></td>
                                    <td class="justify-content-around">
                                        <?php if(isset($p->getPost->link1)): ?>
                                            <?php if(str_contains($p->getPost->link1, 'drive.google')): ?>
                                                <a target="_blank" href="<?php echo e($p->getPost->link1); ?>" class="btn btn-primary btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                    <span class="badge badge-light">1</span>
                                                </a>
                                                <?php else: ?>
                                                <a target="_blank" href="<?php echo e($p->getPost->link1); ?>" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                    <span class="badge badge-light">1</span>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(isset($p->getPost->link2)): ?>
                                                <?php if(str_contains($p->getPost->link2, 'drive.google')): ?>
                                                    <a target="_blank" href="<?php echo e($p->getPost->link2); ?>" class="btn btn-success btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">2</span>
                                                    </a>
                                                <?php else: ?>
                                                    <a target="_blank" href="<?php echo e($p->getPost->link2); ?>" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">2</span>
                                                    </a>
                                                <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(isset($p->getPost->link3)): ?>
                                                <?php if(str_contains($p->getPost->link3, 'drive.google')): ?>
                                                    <a target="_blank" href="<?php echo e($p->getPost->link3); ?>" class="btn btn-danger btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">3</span>
                                                    </a>
                                                <?php else: ?>
                                                    <a target="_blank" href="<?php echo e($p->getPost->link3); ?>" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">3</span>
                                                    </a>
                                                <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-inline-flex">
                                            
                                            <a target="" href="<?php echo e(route('post.edit',$p->post_id)); ?>" class="btn mr-2 btn-outline-warning btn-sm">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('comment.destroy',$p->id)); ?>"  method="post">
                                               <?php echo csrf_field(); ?>
                                               <?php echo method_field("DELETE"); ?>
                                               <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                   <i class="feather-trash-2"></i>
                                               </button>
                                            </form> 
                                            
                                            <a target="_blank" href="<?php echo e(route('post.show',$p->post_id)); ?>" class="btn ml-2 btn-outline-success btn-sm">
                                                <i class="feather-eye"></i>
                                            </a>
                                        </div>




                                    </td>

                                </tr>
                                <?php endif; ?>

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

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/comment/index.blade.php ENDPATH**/ ?>