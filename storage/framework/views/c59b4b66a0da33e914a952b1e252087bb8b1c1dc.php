<?php if(auth()->guard()->check()): ?>
    <div class="aside-left bg-white px-3 pb-2 min-vh-100 shadow">
        <ul class="menu" style="list-style-type: none">
            <li class="brand-icon">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(asset(\App\Custom::$info['c-logo'])); ?>" class="brand-icon-img">
                        <small
                            class="text-primary font-weight-bold h5 mb-0 ml-2"><?php echo e(\App\Custom::$info['short_name']); ?></small>
                    </div>
                    <button class="btn btn-light d-block d-lg-none aside-menu-close">
                        <i class="feather-x fa-2x"></i>
                    </button>
                </div>
            </li>
            <li>
                <a class="menu-item mt-3" href="<?php echo e(route('home')); ?>">
                    <span>
                        <i class="feather-home"></i>
                        Dashboard
                    </span>
                </a>
            </li>

            <?php $__env->startComponent('component.nav-spacer'); ?>
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('component.nav-title'); ?>
                Game Management
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('component.nav-item'); ?>
                <?php $__env->slot('icon'); ?>
                    <i class="fas fa-gamepad"></i>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('name'); ?>
                    Add Game
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('link'); ?>
                    <?php echo e(route('post.create')); ?>

                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('component.nav-item-count'); ?>
                <?php $__env->slot('icon'); ?>
                    <i class="feather-list"></i>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('name'); ?>
                    Game List
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('link'); ?>
                    <?php echo e(route('post.index')); ?>

                <?php $__env->endSlot(); ?>
                <?php $__env->slot('count'); ?>
                    <?php echo e(\App\Post::count()); ?>

                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('component.nav-spacer'); ?>
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('component.nav-title'); ?>
                Software Management
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('component.nav-item'); ?>
                <?php $__env->slot('icon'); ?>
                    <i class="fas fa-gamepad"></i>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('name'); ?>
                    Add Software
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('link'); ?>
                    <?php echo e(route('software.create')); ?>

                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('component.nav-item-count'); ?>
                <?php $__env->slot('icon'); ?>
                    <i class="feather-list"></i>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('name'); ?>
                    Software List
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('link'); ?>
                    <?php echo e(route('software.index')); ?>

                <?php $__env->endSlot(); ?>
                <?php $__env->slot('count'); ?>
                    <?php echo e(\App\Software::count()); ?>

                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('component.nav-spacer'); ?>
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('component.nav-title'); ?>
                Category Management
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('component.nav-item'); ?>
                <?php $__env->slot('icon'); ?>
                    <i class="fas fa-clipboard-list"></i>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('name'); ?>
                    Add Category
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('link'); ?>
                    <?php echo e(route('category.create')); ?>

                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
            <!-- <?php $__env->startComponent('component.nav-item'); ?>
        <?php $__env->slot('icon'); ?>
            <i class="fas fa-network-wired"></i>
        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('name'); ?>
            Add Popular
        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('link'); ?>
            <?php echo e(route('popular.create')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

                <?php $__env->startComponent('component.nav-item-count'); ?>
        <?php $__env->slot('icon'); ?>
            <i class="feather-list"></i>
        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('name'); ?>
            Popular List
        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('link'); ?>
            <?php echo e(route('popular.index')); ?>

        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('count'); ?>
            <?php echo e(\App\Popular::count()); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

                <?php $__env->startComponent('component.nav-spacer'); ?>
    <?php echo $__env->renderComponent(); ?>

                <?php $__env->startComponent('component.nav-title'); ?>
        Ads Management
    <?php echo $__env->renderComponent(); ?>

                <?php $__env->startComponent('component.nav-item'); ?>
        <?php $__env->slot('icon'); ?>
            <i class="feather-gift"></i>
        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('name'); ?>
            Add Ads
        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('link'); ?>
            <?php echo e(route('ads.create')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

                <?php $__env->startComponent('component.nav-item-count'); ?>
        <?php $__env->slot('icon'); ?>
            <i class="feather-list"></i>
        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('name'); ?>
            Ads List
        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('link'); ?>
            <?php echo e(route('ads.index')); ?>

        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('count'); ?>
            <?php echo e(\App\Ads::count()); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?> -->

            <?php $__env->startComponent('component.nav-spacer'); ?>
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('component.nav-title'); ?>
                Request Management
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('component.nav-item-count'); ?>
                <?php $__env->slot('icon'); ?>
                    <i class="feather-list"></i>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('name'); ?>
                    Request List
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('link'); ?>
                    <?php echo e(route('request_app.index')); ?>

                <?php $__env->endSlot(); ?>
                <?php $__env->slot('count'); ?>
                    <?php echo e(\App\RequestApp::count()); ?>

                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('component.nav-item-count'); ?>
                <?php $__env->slot('icon'); ?>
                    <i class="feather-list"></i>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('name'); ?>
                    Comment List
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('link'); ?>
                    <?php echo e(route('comment.index')); ?>

                <?php $__env->endSlot(); ?>
                <?php $__env->slot('count'); ?>
                    <?php echo e(\App\Comment::count()); ?>

                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
            

            

            
            
            
            
            
            

            <?php $__env->startComponent('component.nav-item'); ?>
                <?php $__env->slot('icon'); ?>
                    <i class="feather-list"></i>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('name'); ?>
                    Popular List
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('link'); ?>
                    <?php echo e(route('viewer.index')); ?>

                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('component.nav-spacer'); ?>
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('component.nav-title'); ?>
                Profile Management
            <?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('component.nav-item'); ?>
                <?php $__env->slot('icon'); ?>
                    <i class="feather-user"></i>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('name'); ?>
                    Edit Profile
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('link'); ?>
                    <?php echo e(route('profile.edit')); ?>

                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>




            <?php $__env->startComponent('component.nav-spacer'); ?>
            <?php echo $__env->renderComponent(); ?>
            <li>
                <a class="menu-item alert-secondary" onclick="logout()" href="#">
                    <span>
                        <i class="fas fa-lock"></i>
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </div>


<?php endif; ?>
<?php /**PATH /var/www/modgamesmm/resources/views/dashboard/nav.blade.php ENDPATH**/ ?>