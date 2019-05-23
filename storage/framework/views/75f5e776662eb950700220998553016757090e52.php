<?php $__env->startSection('body_class','login'); ?>

<?php $__env->startSection('content'); ?>
    
<div class="flex-center position-ref ">
    <div class="top-left brand">
        <img src="img/art.png" alt="">
        <h1>Reset password </h1>
    </div>
</div>

<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <?php if(!empty($message)): ?>
        <div class="panel panel-danger">
        
                
                <div class="panel-heading"> <div class="col-12 col-lg-5"><?php echo e($message); ?></div>
                <div  align="right"> .</a></div>
            </div>
            </div>
            <?php endif; ?>
            <?php $__currentLoopData = $reset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $Email=$resets->Email;
                    $Q1=$resets->Q1;
                    $Q1A=$resets->Q1A;
                    $Q2=$resets->Q2;
                    $Q2A=$resets->Q2A;
                    $Q3=$resets->Q3;
                    $Q3A=$resets->Q3A;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <form action="restnewpass" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Email">Youre Email</label>
                <h2> <?php echo e($Email); ?></h2>
             </div>
             
            <div class="form-group">
                <label for="Qt1">Question 1</label>
                <h3><?php echo e($Q1); ?></h3>
                 </div>
                 <div class="form-group">
                        <label for="inputAddress">Answer for Question 1</label>
                        <input type="text" name="ANS1" class="form-control" id="ANS1" value="<?php echo e(old('ANS1')); ?>"  required>
                    </div>
            <div class="form-group">
                <label for="Qt2">Question 2</label>
                <h3><?php echo e($Q2); ?></h3>
                 </div>
                 <div class="form-group">
                        <label for="inputAddress">Answer for Question 2</label>
                        <input type="text" name="ANS2" class="form-control" id="ANS2" value="<?php echo e(old('ANS2')); ?>"  required >
                     </div>
            <div class="form-group">
                    <label for="Qt3">Question 3</label>
                    <h3><?php echo e($Q3); ?></h3>
                     </div>
                     <div class="form-group">
                            <label for="inputAddress">Answer for Question 3</label>
                            <input type="text" name="ANS3" class="form-control" id="ANS3" value="<?php echo e(old('ANS3')); ?>" required>
                         </div>
                         
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" id="Email" name="Email" value="<?php echo e($Email); ?>">
                            
                            <button type="submit" class="btn btn-success">Submit </button>
            </form>
                             
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