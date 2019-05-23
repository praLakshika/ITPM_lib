<?php $__env->startSection('title',"Add an Diagnosis", "Diagnosis"); ?> 

<?php $__env->startSection('content'); ?>
<?php
                
use Illuminate\Support\Facades\DB;
use App\Models\Service;

$services = Service::all();
?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="adddiagnosis" method="post" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>

        <?php if(!$errors->isEmpty()): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errors->first(); ?>

            </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="pa_name">Patient name</label>
            <h2> <?php echo e($patient->name); ?></h2>
         </div>
        
        <div class="form-group">
            <label for="pa_service">Service type *</label>
            <select name="pa_service" class="form-control" >
                <option  disabled>Select one</option>
                <option  disabled>*****Orthosis*****</option>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(($service->type)==="orthosis"): ?>
                    <option value=<?php echo e($service->serviceName."(orthosis)"); ?>><?php echo e($service->serviceName); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                <option  disabled>****Prosthesis****</option>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(($service->type)==="prosthesis"): ?>
                    <option value=<?php echo e($service->serviceName."(prosthesis)"); ?>><?php echo e($service->serviceName); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                <option  disabled>*****Cosmetic*****</option>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(($service->type)==="cosmetic"): ?>
                    <option value=<?php echo e($service->serviceName."(cosmetic)"); ?>><?php echo e($service->serviceName); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                <option  disabled>*****Children******</option>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(($service->type)==="children"): ?>
                    <option value=<?php echo e($service->serviceName."(children)"); ?>><?php echo e($service->serviceName); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                
            </select>
        </div>
        <div class="form-group">
            <label for="pa_dr">Consultant Doctor *</label>
            <input type="text" class="form-control" name="pa_dr" id="pa_dr" placeholder="'DR.Sunil'" value="<?php echo e(old('pa_dr')); ?>">
        </div>
        <div class="form-group">
            <label for="pa_height">Height(cm) *</label>
            <input type="text" class="form-control" name="pa_height" id="pa_height" placeholder="eg:-180cm" value="<?php echo e(old('pa_dr')); ?>">
        </div>
        <div class="form-group">
            <label for="pa_weight">Weight(kg) *</label>
            <input type="text" class="form-control" name="pa_weight" id="pa_weight" placeholder="eg:-60KG" value="<?php echo e(old('pa_dr')); ?>">
        </div>
        <div class="form-group">
            <label for="pa_sketch">Sketch *</label>
            <input type="file" class="form-control" name="pa_sketch" id="pa_sketch"  >
        </div>
        <div class="form-group">
          <label for="pa_discription">Description *</label>
          <textarea class="form-control" name="pa_discription" id="pa_discription" cols="30" rows="10" placeholder="Patient description"><?php echo e(old('pa_discription')); ?></textarea>
        </div>
        <input type="hidden" id="name" name="name" value="<?php echo e($patient->name); ?>">
        <input type="hidden" id="ID" name="ID" value="<?php echo e($patient->id); ?>">
        <a href="<?php echo e(route('admin.diagnosis.index')); ?>" class="btn btn-danger">Cancel</a>
         <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
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