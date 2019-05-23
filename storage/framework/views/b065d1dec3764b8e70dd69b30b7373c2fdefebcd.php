<?php $__env->startSection('title',"Add an fine fee"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addbook_issue" method="post" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>


        <?php if(!$errors->isEmpty()): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errors->first(); ?>

            </div>
        <?php endif; ?>
        <?php
        use Illuminate\Support\Facades\DB;
        use Carbon\Carbon;
        $book_categorys = DB::select('select * from book_category');
       
       
        ?>
        <?php if(Session::has('message')): ?>
            <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        
        <div class="form-group">
            <label for="book_author">Book categorys *</label>
            <select name="book_author" class="form-control" >
                <option  disabled>Select one</option>
                <?php $__currentLoopData = $book_categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value=<?php echo e($book_category->id); ?>><?php echo e($book_category->book_category_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </select>
        </div>
        
        <div class="form-group">
                <label for="book_quantity">Book quantity *</label>
                <input type="text" class="form-control" name="book_quantity" id="book_quantity" placeholder="Book quantity" value="<?php echo e(old('book_quantity')); ?>">
            </div>
        <a href="<?php echo e(route('admin.fine_fee')); ?>" class="btn btn-danger">Cancel</a>
        <a href="<?php echo e(route('admin.fine_fee.add')); ?>" class="btn btn-primary">Clear</a>
            
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