<?php $__env->startSection('title',"Store", "Store"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addstore" method="post">
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
                <label for="name">Item name </label>
                <h4><?php echo e($stores->iteamname); ?></h4>
              </div>
        <div class="form-group">
          <label for="quantity">Item quantity </label>
        <h4><?php echo e($stores->iteam_quantity); ?> <?php echo e($stores->quantity_type); ?></h4>
        </div>
        <div class="form-group">
            <label for="plus">Item plus *</label>
            <input type="text" class="form-control"name="plus" id="plus" value="<?php echo e(old('plus')); ?>" >
          </div>
          
        <input type="hidden" id="id" name="id" value="<?php echo e($stores->id); ?>">
        <input type="hidden" id="empID" name="empID" value="<?php echo e($emp); ?>">
        <a href="<?php echo e(route('admin.store')); ?>" class="btn btn-danger">Cancel</a>
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