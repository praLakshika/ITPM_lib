<?php $__env->startSection('title',"Add  finacial "); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-2">


<form action="addninvoice" method="post">
<?php echo e(csrf_field()); ?>

        <h3>Invoice</h3>
<?php if(!$errors->isEmpty()): ?>
<div class="alert alert-danger" role="alert">
<?php echo $errors->first(); ?>

</div>
<?php endif; ?>

<?php if(Session::has('message')): ?>
    <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>

<?php
                
use Illuminate\Support\Facades\DB;
use App\Models\Service;

$services = Service::all();
?>
<div class="form-group">
    <label for="Service">Service type *</label>
    <select name="Service" class="form-control" >
        <option  disabled>Select one</option>
        <option  disabled>*****Orthosis*****</option>
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(($service->type)==="orthosis"): ?>
            <option value=<?php echo e($service->id); ?>><?php echo e($service->serviceName); ?></option>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        <option  disabled>****Prosthesis****</option>
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(($service->type)==="prosthesis"): ?>
            <option value=<?php echo e($service->id); ?>><?php echo e($service->serviceName); ?></option>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        <option  disabled>*****Cosmetic*****</option>
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(($service->type)==="cosmetic"): ?>
            <option value=<?php echo e($service->id); ?>><?php echo e($service->serviceName); ?></option>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        <option  disabled>*****Children******</option>
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(($service->type)==="children"): ?>
            <option value=<?php echo e($service->id); ?>><?php echo e($service->serviceName); ?></option>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        
    </select>
</div>
        <div class="form-group">
            <label for="oth_am">Amount</label>
            <input type="text" class="form-control" name="amount" id="amount" placeholder="eg:-6786000.00"value="<?php echo e(old('amount')); ?>" >
        </div>
        <input type="hidden" id="id" name="id" value="<?php echo e($patient->id); ?>">
        <a href="<?php echo e(route('admin.financial')); ?>" class="btn btn-danger">Cancel</a>
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