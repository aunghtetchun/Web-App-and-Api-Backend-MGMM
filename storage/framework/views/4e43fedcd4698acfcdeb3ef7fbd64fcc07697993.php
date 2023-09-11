<?php $__env->startSection("title"); ?> User List <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[

    ]]); ?>
        <?php $__env->slot("last"); ?> User List <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    

    <div class="row">
        <div class="col-12">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> User List <?php $__env->endSlot(); ?>
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
                                <th scope="col">မက်ဆေ့ပို့ရန်</th>
                                <th scope="col">သိမ်းထားသောဂိမ်း</th>
                                <th scope="col">Created At</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = App\User::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr >
                                    <th scope="row"><?php echo e($p->id); ?></th>
                                 
                                    <td><?php echo e($p->name); ?></td>
                                    <td><?php echo e($p->email); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                                            <i class="feather-message-square"></i>
                                          </button>
                                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo e(route('user.sendMessage')); ?>" method="post" enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="form-row align-items-end">
                                                            <div class="col-12 col-md-8">
                                                                <label for="message">Message</label>
                                                                <input type="hidden" name="user_id" value="<?php echo e($p->id); ?>">
                                                                <input type="text" class="form-control <?php if ($errors->has('message')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('message'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="message" id="message" value="<?php echo e(old('message')); ?>" placeholder="မက်ဆေ့စာသား">
                                                                <?php if ($errors->has('message')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('message'); ?>
                                                                <small class="invalid-feedback font-weight-bold" role="alert">
                                                                    <?php echo e($message); ?>

                                                                </small>
                                                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                            </div>
                                                            <div class="col-12 col-md-4">
                                                                <button type="submit" class="btn btn-primary form-control" ><i class="fas fa-plus-square mr-1"></i> Send Message</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </td>
                                    <td><?php echo e($p->getSaveGames->count()); ?> </td>
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

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/user/index.blade.php ENDPATH**/ ?>