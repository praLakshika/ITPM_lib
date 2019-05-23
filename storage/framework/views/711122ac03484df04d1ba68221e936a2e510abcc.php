<?php $__env->startSection('body_class','login'); ?>

<?php $__env->startSection('content'); ?>
    
<div class="flex-center position-ref ">
    <div class="top-left brand">
        <img src="img/art.png" alt="">
        <h1>Set new password</h1>
    </div>
</div><div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    
    <?php if(!$errors->isEmpty()): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errors->first(); ?>

        </div>
    <?php endif; ?> 
    <?php if($message!=null): ?>
        <div class="alert alert-danger">
            <?php echo e($message); ?></div>
    <?php endif; ?>
    <div class="form-group">
        <label for="Email">Youre Email</label>
        <h2> <?php echo e($resets->Email); ?></h2>
     </div>
     <form action="setnewpass" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <label for="pass">New password</label>
            <input type="password" name="pass" class="form-control" id="pass"  required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Confirm password</label>
            <input type="password" name="Cpass" class="form-control" id="Cpass"  required>
        </div>
        <input type="hidden" id="Email" name="Email" value="<?php echo e($resets->Email); ?>">
        <button type="submit" class="btn btn-success">Next </button>
                     
</div>
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