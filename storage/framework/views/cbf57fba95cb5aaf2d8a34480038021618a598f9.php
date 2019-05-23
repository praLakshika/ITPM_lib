<?php $__env->startSection('title',"Add a book category", "Diagnosis"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addbook_category" method="post" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>

        <?php if(Session::has('message')): ?>
            <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <div class="form-group">
            <label for="book_category_name">Book category Name *</label>
            <input type="text" class="form-control" name="book_category_name" id="book_category_name" placeholder="Book category Name" value="<?php echo e(old('book_category_name')); ?>">
        </div> 
        <div class="form-group">
            <label for="fine_fee">Fine fee *</label>
            <input type="text" class="form-control" name="fine_fee" id="fine_fee" placeholder="Fine fee" value="<?php echo e(old('fine_fee')); ?>">
        </div>
       
        <a href="<?php echo e(route('admin.book')); ?>" class="btn btn-danger">Cancel</a>
        <a href="<?php echo e(route('admin.book_category.add')); ?>" class="btn btn-primary">Clear</a>
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