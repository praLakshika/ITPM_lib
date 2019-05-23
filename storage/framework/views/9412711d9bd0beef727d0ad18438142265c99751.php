<?php $__env->startSection('title',"Edit a Member", "Member"); ?>

<?php $__env->startSection('content'); ?>
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <form action="editmember" method="post" enctype="multipart/form-data">

            <?php echo e(csrf_field()); ?>

            <?php if(Session::has('message')): ?>
                <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
            <?php endif; ?>
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
                <label for="inputAddress">Member Name</label>
                <input type="text" name="name" class="form-control" id="inputAddress" value="<?php echo e($Member->name); ?>" >
            </div>
            
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" name="contact" class="form-control" id="contact" value="<?php echo e($Member->contact); ?>">
            </div>
            <div class="form-group">
                    <label for="address">Address *</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="10" ><?php echo e($Member->address); ?></textarea>
                  </div>
            
                <input type="hidden" id="id" name="id" value="<?php echo e($Member->id); ?>">
                <input type="hidden" id="email" name="email" value="<?php echo e($Member->email); ?>">
                <a href="<?php echo e(route('patient.member')); ?>" class="btn btn-danger">Cancel</a>
                <a href="<?php echo e(route('patient.member.edit',[$Member->id])); ?>" class="btn btn-danger">Clear</a>
            
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
<?php echo $__env->make('member.layouts.member', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>