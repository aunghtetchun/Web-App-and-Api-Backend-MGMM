<?php $__env->startSection("title"); ?> Sample Page <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[
        "a" => "#",
        "b" => "#"
    ]]); ?>
    <?php $__env->slot("last"); ?> Sample <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Card Title <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>  <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut consequatur, cumque debitis doloremque eius enim error facere hic maxime necessitatibus officiis, perferendis quam quisquam reiciendis similique totam ut veritatis?
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-12 col-md-6">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Card Title 2 <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus fa-fw"></i>
                        </a>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut consequatur, cumque debitis doloremque eius enim error facere hic maxime necessitatibus officiis, perferendis quam quisquam reiciendis similique totam ut veritatis?
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>

        <div class="col-12 col-md-6">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> မင်္ဂလာပါ <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>  <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/sample.blade.php ENDPATH**/ ?>