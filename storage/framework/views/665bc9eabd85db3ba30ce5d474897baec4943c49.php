<?php $__env->startSection("title"); ?> See Suggest <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[
        "Suggest" => "#",
    ]]); ?>
        <?php $__env->slot("last"); ?> See Suggest <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-12 col-md-11 col-lg-10">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="fa-fw feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Suggest <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                    <a href="<?php echo e(route('request_app.index')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fa-fw fas fa-list fa-fw"></i>
                    </a>
                    <form class="d-inline-block" action="<?php echo e(route('request_app.destroy',$requestApp->id)); ?>"  method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                        <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                            <i class="fa-fw feather-trash-2"></i>
                        </button>
                    </form>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <div class="card-body">
                        <table class="table table-bordered table-responsive-sm table-responsive-md">
                            <tbody>
                            <tr>
                                <td>App Name</td>
                                <td><?php echo e($requestApp->app_name); ?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><?php echo e($requestApp->username); ?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><?php echo e($requestApp->phone); ?></td>
                            </tr>
                            <tr>
                                <td>Playstore Link</td>
                                <td><?php echo e($requestApp->playstore_link); ?></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><?php echo e($requestApp->description); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/request/show.blade.php ENDPATH**/ ?>