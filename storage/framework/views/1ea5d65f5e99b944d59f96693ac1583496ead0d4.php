<?php $__env->startSection('title',"Add a Patient", "Patient"); ?>

<?php $__env->startSection('content'); ?>
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <form action="patient" method="post" enctype="multipart/form-data">

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
            <div>

            </div>
            <div class="form-group">
                <label for="inputAddress">Patient Name</label>
                <input type="text" name="name" class="form-control" id="inputAddress" value="<?php echo e(old('name')); ?>" placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="inputAddress">E-Mail</label>
                <input type="text" name="email" class="form-control" id="inputAddress" value="<?php echo e(old('email')); ?>" placeholder="Valid Email Address">
            </div>
            <div class="form-group">
                <label for="inputAddress">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="inputAddress" value="Male" >
                    <label class="form-check-label" for="exampleRadios1">
Male                  </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="inputAddress" value="Female" >
                    <label class="form-check-label" for="exampleRadios2">
Female                    </label>
                </div>

            </div>
            <div class="form-group">
                <label for="inputAddress">Nic (without 'V')</label>
                <input type="text" name="nic" class="form-control" id="inputAddress" value="<?php echo e(old('nic')); ?>" placeholder="xxxxxxxxxx ">
            </div>
            
            <div class="form-group">
                <label for="inputAddress">Mobile</label>
                <input type="text" name="mobile" class="form-control" id="inputAddress" value="<?php echo e(old('mobile')); ?>" placeholder="Valid Mobile Number">
            </div>
            <div class="form-group">
                    <label for="address">Address *</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="10" placeholder="Patient Address"><?php echo e(old('address')); ?></textarea>
                  </div>
            <div class="form-group">
                <label for="pat_pic">Patient Picture</label>
                <input type="file" class="form-control" name="pat_pic" id="pat_pic" >
            </div>
            <button type="reset" class="btn btn-primary">Clear</button>
            <button type="submit" class="btn btn-primary">Add</button>

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