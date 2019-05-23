<?php $__env->startSection('title',"Edit Employee", "Employee"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
          <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
    <?php endif; ?>

    <?php echo e(Form::open(['route'=>['director.employees.update', $employee->id],'method' => 'put','class'=>'form-horizontal form-label-left', 'enctype'=>"multipart/form-data"])); ?>

        
        <div class="form-group">
          <label for="inputAddress">Name</label>
          <input type="text" class="form-control" id="inputName" name="inputName" placeholder="" value="<?php echo e($employee->name); ?>">
        </div>
        <div class="form-group">
            <?php echo Form::label('email', 'Email'); ?>

            <?php echo Form::email('email',  null, ['class' => 'form-control', 'placeholder'=>'Valid email']); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('contact', 'Contact Number'); ?>

            <?php echo Form::text('contact',  null, ['class' => 'form-control', 'placeholder'=>'Mobile number']); ?>

        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder=""  value="<?php echo e($employee->address); ?>">
        </div>
        <div class="form-group">
          <label for="empType">Employee Type</label>
          <select id="empType" name="empType" class="form-control">
            <option <?php if($employee->employeeType == 'Director'): ?> selected <?php endif; ?>>Director</option>
            <option <?php if($employee->employeeType == 'Receptionist'): ?> selected <?php endif; ?>>Receptionist</option>
            <option <?php if($employee->employeeType == 'PNO'): ?> selected <?php endif; ?>>PNO</option>
          </select>
        </div>
        <a class="btn btn-danger" href="<?php echo e(route('admin.employees')); ?>"> <?php echo e(__('views.admin.users.edit.cancel')); ?></a>
        
        <button type="submit" class="btn btn-success">Update</button>
      <?php echo e(Form::close()); ?>

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
<?php echo $__env->make('employee.director.layouts.director', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>