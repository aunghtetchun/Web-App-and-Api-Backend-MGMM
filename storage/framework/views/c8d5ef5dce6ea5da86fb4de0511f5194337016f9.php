<?php $__env->startSection("title"); ?> Add Account <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent("component.breadcrumb",["data"=>[
        "Account" => route("account.index"),
    ]]); ?>
        <?php $__env->slot("last"); ?> Add Account <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12 col-md-8 col-lg-6">
            <?php $__env->startComponent("component.card"); ?>
                <?php $__env->slot('icon'); ?> <i class="feather-file text-primary"></i> <?php $__env->endSlot(); ?>
                <?php $__env->slot('title'); ?> Add Account <?php $__env->endSlot(); ?>
                <?php $__env->slot('button'); ?>
                    <a href="<?php echo e(route('account.index')); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                <?php $__env->endSlot(); ?>
                <?php $__env->slot('body'); ?>
                    <div>
                        <form action="<?php echo e(route('account.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="seller_id">Seller</label>
                                        <select required name="seller_id" id="seller_id" class="form-control" >
                                            <option selected diabled>ရောင်းသူရွေးပါ</option>    
                                            <?php $__currentLoopData = App\Seller::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($seller->id); ?>"><?php echo e($seller->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <!-- title 	description 	profile 	security 	price 	skin_id 	sold  -->
                                        <?php if ($errors->has('seller_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('seller_id'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Account အမျိုးအစား</label>
                                        <select required name="type" id="type" class="form-control" >
                                            <option value="ML" selected >Mobile Legend</option>
                                            <option value="LOL" >League Of Legend</option>
                                            <option value="PUBG" >Pubg</option>
                                        </select>
                                        <?php if ($errors->has('type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('type'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="game_id">Account ID</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('game_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('game_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="game_id" id="game_id" value="<?php echo e(old('game_id')); ?>" placeholder="">
                                        <?php if ($errors->has('game_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('game_id'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="server_id">Server ID</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('server_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('server_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="server_id" id="server_id" value="<?php echo e(old('server_id')); ?>" placeholder="">
                                        <?php if ($errors->has('server_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('server_id'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Account Title</label>
                                        <input required type="text" class="form-control <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="title" id="title" value="<?php echo e(old('title')); ?>" placeholder="">
                                        <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Account Price</label>
                                        <input required type="number" class="form-control <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="price" id="price" value="<?php echo e(old('price')); ?>" placeholder="">
                                        <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group input-field">
                                        <label class="active" for="images">Account Info Photos</label>
                                        <div class="input-images-1" style="padding-top: .5rem;"></div>
                                        <?php if ($errors->has('images')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('images'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                   
                                    <div class="form-group justify-content-center align-items-center">
                                        <label for="profile">Account Profile</label>
                                        <input  required type="file" accept="image/png, .jpeg, .jpg,image/webp, image/gif" class="form-control d-none  p-1 <?php if ($errors->has('profile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('profile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="profile" id="profile" value="<?php echo e(old('profile')); ?>" onchange="readURL(this);">
                                        <?php if ($errors->has('profile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('profile'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        <img id="blah" onclick="$('#profile').trigger('click');" class="w-100 rounded" src="<?php echo e(asset('dashboard/images/upload.png')); ?>" alt="your image" />
                                    </div>    
                                    <div class="form-group">
                                        <label for="description">Account Description</label>
                                        <textarea required class="form-control <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="description" id="description">
                                        <?php echo e(old('description')); ?>

                                        </textarea>
                                        <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>        
                                    <div class="form-group">
                                        <label for="skin_id">Select Skins (မထည့်လည်းရပါတယ်)</label>
                                        <select name="skin_id[]" id="skin_id" class="form-control select2img" multiple="multiple">
                                            <?php $__currentLoopData = \App\Skin::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option data-image="<?php echo e(asset("/storage/skin/".$c->url)); ?>" value="<?php echo e($c->id); ?>" ><?php echo e($c->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if ($errors->has('skin_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('skin_id'); ?>
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            <?php echo e($message); ?>

                                        </small>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>                        

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Account</button>
                        </form>
                    </div>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>
    <script>
         $(document).ready(function() {
            $('.select2img').select2({
                templateResult: formatState
            });
        });
        $('.input-images-1').imageUploader();
        function formatState (state) {
            if (!state.id) { return state.text; }
            var baseUrl = state.element.getAttribute('data-image');
            console.log(baseUrl);
            return $('<span><img src="' + baseUrl + '" class="img-flag " style="width:200px;"/> ' + state.text + '</span>');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/account/create.blade.php ENDPATH**/ ?>