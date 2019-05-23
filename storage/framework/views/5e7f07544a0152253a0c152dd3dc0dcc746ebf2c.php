<?php $__env->startSection('title',"Question Forum Management"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updatereply" method="post"enctype="multipart/form-data">
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
              <label for="name"><h4>Reply</h4> </label>
              <h2><?php echo e($replyx->replay); ?></h2>
              <?php if(!strcmp(($replyx->replay_pic),'nophoto')==0): ?>
              <img height="300" width="300" src="\image\reply\pic\<?php echo e($replyx->replay_pic); ?>" class="user-profile-image">
              <?php endif; ?>

        </div> 
        <div class="form-group">
                <label for="replye">Reply *</label>
                <textarea class="form-control" name="replye" id="replye" cols="30" rows="10" placeholder="reply " ><?php echo e($replyx->replay); ?></textarea>
        </div>
        <div class="form-group">
                <label for="rep_pic">Reply image (optional)</label>
                <input type="file" class="form-control" name="rep_pic" id="rep_pic" >
        </div>
        <input type="hidden" id="id" name="id" value="<?php echo e($replyx->id); ?>">
        <a href="<?php echo e(route('admin.question_forum')); ?>" class="btn btn-danger">Cancel</a>
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