<?php $__env->startSection('title',"Add an Item", "Item"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="additem" method="post" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>

<?php if(!$errors->isEmpty()): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $errors->first(); ?>

    </div>
<?php endif; ?>
<?php
use Illuminate\Support\Facades\DB;
$email=auth()->user()->email;
$IDs = DB::table('employees')->where('email', $email)->get();
$emp = 0;
        foreach($IDs as $ID)
        {
            $emp=$ID->id;
            
        }
?>
<?php if(Session::has('message')): ?>
    <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
        <div class="form-group">
            <label for="it_name">Item name *</label>
            <input type="text" class="form-control" name="it_name" id="it_name" placeholder="Name" value="<?php echo e(old('it_name')); ?>">
        </div>
        <div class="form-group">
            <label for="it_company">Item company *</label>
            <input type="text" class="form-control" name="it_company" id="it_company" placeholder="'ossur'" value="<?php echo e(old('it_company')); ?>">
        </div>
        <div class="form-group">
            <label for="it_type">Quantity type *</label>
            <select name="it_type" class="form-control" >
                <option value="">Select one</option>
                <option value="pieces">Pieces</option>
                <option value="sheet">Sheet</option>
                <option value="kg">KG</option>
                <option value="cm">CM</option>
                <option value="Ft">Feet</option>
            </select>
        </div>
        <div class="form-group">
            <label for="it_quantity">Item quantity *</label>
            <input type="text" class="form-control" name="it_quantity" id="it_quantity" placeholder="quantity" value="<?php echo e(old('it_quantity')); ?>">
        </div>
       
        <div class="form-group">
            <label for="it_max">Item maximum quantity *</label>
            <input type="text" class="form-control" name="it_max" id="it_max" placeholder="eg:-30kg" value="<?php echo e(old('it_max')); ?>">
        </div>
        <div class="form-group">
            <label for="it_min">Item minimum quantity *</label>
            <input type="text" class="form-control" name="it_min" id="it_min" placeholder="eg:-3kg" value="<?php echo e(old('it_min')); ?>">
        </div>
        <div class="form-group">
            <label for="it_pic">Item image *</label>
            <input type="file" class="form-control" name="it_pic" id="it_pic" >
        </div>
        <input type="hidden" id="empID" name="empID" value="<?php echo e($emp); ?>">
        
        <a href="<?php echo e(route('admin.store')); ?>" class="btn btn-danger">Cancel</a>
        <a href="<?php echo e(route('admin.store.add')); ?>" class="btn btn-primary">Clear</a>
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