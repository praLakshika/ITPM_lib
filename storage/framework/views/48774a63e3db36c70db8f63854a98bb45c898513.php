<?php $__env->startSection('title',"Edit doctor", "doctor"); ?>

<?php $__env->startSection('content'); ?>
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <form action="editdoc" method="post">
            <?php echo e(csrf_field()); ?>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="inputAddress">Doctor Name</label>
                <input type="text" name="name" class="form-control" id="inputAddress" value="<?php echo e($doctor->name); ?>">
            </div>
            <div class="form-group">
                <label for="inputAddress">Hospital</label>
                <input type="text" name="hospital" class="form-control" id="inputAddress" value="<?php echo e($doctor->hospital); ?>">
            </div>
            

            <div class="form-group">
                <label for="inputAddress">Mobile Number</label>
                <input type="text" name="mobile" class="form-control" id="inputAddress" value="<?php echo e($doctor->mobile); ?>">
            </div>





            <button type="" class="btn btn-primary">Clear</button>
            <button type="submit" class="btn btn-primary">Edit</button>
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
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>