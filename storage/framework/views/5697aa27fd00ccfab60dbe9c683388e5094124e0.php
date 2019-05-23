<?php $__env->startSection('title',"Add a author", "Diagnosis"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addauthor" method="post" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>


        <?php if(!$errors->isEmpty()): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errors->first(); ?>

            </div>
        <?php endif; ?>
       
        <?php if(Session::has('message')): ?>
            <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <div class="form-group">
            <label for="author_name">Author Name *</label>
            <input type="text" class="form-control" name="author_name" id="author_name" placeholder="Name" value="<?php echo e(old('author_name')); ?>">
        </div>
        
        <div class="container">
            <div class="form-group">
                <?php echo Form::label('birthday', 'Birthday (not required)'); ?>

                <?php echo Form::date('birthday', null, ['class'=> 'form-control']); ?>

            </div>
        </div>
        <div class="form-group">
            <label for="email">Author email (not required)</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
        </div>
        <div class="form-group">
            <label for="contact">Author contact (not required)</label>
            <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php echo e(old('contact')); ?>">
        </div>
        <div class="form-group">
            <label for="author_image">Author Image *</label>
            <input type="file" class="form-control" name="author_image" id="author_image" >
        </div>
        <div class="form-group">
            <label for="author_address">Address *</label>
            <textarea class="form-control" name="author_address" id="author_address" cols="30" rows="10" placeholder="Address " ><?php echo e(old('author_address')); ?></textarea>
          </div>
        
        <a href="<?php echo e(route('admin.author')); ?>" class="btn btn-danger">Cancel</a>
        <a href="<?php echo e(route('admin.author.add')); ?>" class="btn btn-primary">Clear</a>
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