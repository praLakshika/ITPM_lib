<?php $__env->startSection('title',"Diagnosis Management"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updatediagnosis" method="post">
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
                <label for="name">Name *</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo e($diagnosis->patientname); ?>">
              </div>
        <div class="form-group">
          <label for="Weight">Weight(cm) *</label>
          <input type="text" class="form-control"name="Weight" id="Weight" value="<?php echo e($diagnosis->weight); ?>">
        </div>
        <div class="form-group">
            <label for="hight">Hight(kg) *</label>
            <input type="text" class="form-control"name="hight" id="hight" value="<?php echo e($diagnosis->hight); ?>">
          </div>
        <div class="form-group">
            <label for="discription">Description *</label>
            <textarea class="form-control" name="discription" id="discription" cols="30" rows="10" value="" ><?php echo e($diagnosis->discription); ?></textarea>
          </div>
        <input type="hidden" id="id" name="id" value="<?php echo e($diagnosis->id); ?>">
        <a href="<?php echo e(route('admin.diagnosis.index')); ?>" class="btn btn-danger">Cancel</a>
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