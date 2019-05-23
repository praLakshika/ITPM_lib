<?php $__env->startSection('title',"Store", "Store"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updateservices" method="post">
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
                <label for="name">Service name *</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo e($Services->serviceName); ?>">
              </div>
        <div class="form-group">
          <label for="quantity">Service description *</label>
          <textarea class="form-control" name="discription" id="discription" cols="30" rows="10" value="" ><?php echo e($Services->description); ?></textarea>
        </div>
        <input type="hidden" id="id" name="id" value="<?php echo e($Services->id); ?>">
        <input type="hidden" id="uid" name="uid" value="<?php echo e($emp); ?>">
        <a href="<?php echo e(route('admin.services')); ?>" class="btn btn-danger">Cancel</a>
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