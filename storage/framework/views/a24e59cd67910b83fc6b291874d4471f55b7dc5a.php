<?php $__env->startSection('body_class','login'); ?>

<?php $__env->startSection('content'); ?>
    
<div class="flex-center position-ref ">
    <div class="top-left brand">
        <img src="img/art.png" alt="">
        <h1>Set new password</h1>
    </div>
</div>
<a href="<?php echo e(route('reset1')); ?>" class="btn btn-danger">Cancel</a>
       
                        <?php $__env->stopSection(); ?>
                        
                        <?php $__env->startSection('styles'); ?>
                            ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
                            <?php echo e(Html::style(mix('assets/admin/css/users/edit.css'))); ?>

                        <?php $__env->stopSection(); ?>
                        
                        <?php $__env->startSection('scripts'); ?>
                            ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
                            <?php echo e(Html::script(mix('assets/admin/js/users/edit.js'))); ?>

                        <?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>