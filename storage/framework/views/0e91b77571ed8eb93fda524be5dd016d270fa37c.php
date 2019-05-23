<?php $__env->startSection('title',"Add an Service", "Diagnosis"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addservice" method="post" enctype="multipart/form-data">
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
            <label for="service_name">Service Name *</label>
            <input type="text" class="form-control" name="service_name" id="service_name" placeholder="Name" value="<?php echo e(old('service_name')); ?>">
        </div>
        
        <div class="form-group">
            <label for="service_type">Service type *</label>
            <select name="service_type" class="form-control" >
                <option value="">Select one</option>
                <option value="prosthesis">Prosthesis</option>
                <option value="orthosis">Orthosis</option>
                <option value="cosmetic">Cosmetic solutions</option>
                <option value="children">Children</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="service_image">Service Image</label>
            <input type="file" class="form-control" name="service_image" id="service_image" >
        </div>
        <div class="form-group">
            <label for="service_des">Discription</label>
            <textarea class="form-control" name="service_des" id="service_des" cols="30" rows="10" placeholder="Service discription" ><?php echo e(old('service_des')); ?></textarea>
          </div>
          <input type="hidden" id="empID" name="empID" value="<?php echo e($emp); ?>">
        <a href="<?php echo e(route('admin.services')); ?>" class="btn btn-danger">Cancel</a>
        <a href="<?php echo e(route('admin.services.add')); ?>" class="btn btn-primary">Clear</a>
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