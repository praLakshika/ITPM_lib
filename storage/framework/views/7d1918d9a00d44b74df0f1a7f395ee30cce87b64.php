<?php $__env->startSection('title',"Author Management"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updateauthor" method="post" enctype="multipart/form-data">
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
          <label for="name">Author name *</label>
          <input type="text" class="form-control" name="name" id="name" value="<?php echo e($Book_authors->name); ?>">
        </div>
        <div class="form-group">
            <label for="email">Author email </label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo e($Book_authors->email); ?>">
        </div>
        <div class="form-group">
            <label for="contact">Author contact </label>
            <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php echo e($Book_authors->contact); ?>">
        </div>
        <div class="form-group">
            <label for="author_address">Address *</label>
            <textarea class="form-control" name="author_address" id="author_address" cols="30" rows="10" placeholder="Address " ><?php echo e($Book_authors->address); ?></textarea>
        </div>
        <div class="form-group">
            <label for="author_image">Author picture *</label>
            <input type="file" class="form-control" name="author_image" id="author_image" >
        </div>
        <input type="hidden" id="id" name="id" value="<?php echo e($Book_authors->id); ?>">
        <a href="<?php echo e(route('admin.author')); ?>" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
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