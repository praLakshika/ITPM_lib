<?php $__env->startSection('title',"Question Forum Management"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updatequestion" method="post"enctype="multipart/form-data">
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
                <label for="name"><h4>Question title</h4> </label>
                <h2><?php echo e($questionsforum->question_title); ?></h2>
          </div>
          <div class="form-group">
              <label for="name"><h4>Question</h4> </label>
              <h2><?php echo e($questionsforum->Queston); ?></h2>
              <?php if(!($questionsforum->question_pic)==null): ?>
              <img height="300" width="300" src="\image\question\pic\<?php echo e($questionsforum->question_pic); ?>" class="user-profile-image">
              <?php endif; ?>

        </div> 
        
        <div class="form-group">
          <label for="reply1">Reply 1</label>
          <input type="text" class="form-control"name="reply1" id="reply1" value="<?php echo e($questionsforum->replay1); ?>">
        
          <div class="form-group">
              <label for="qurp1_pic">Reply 1 image</label>
              <input type="file" class="form-control" name="qurp1_pic" id="qurp1_pic" accept="image/*" />
          </div>
          <?php if( !($questionsforum->replay1_pic)==null): ?>
          <img height="200" width="200" src="\image\question\reply\pic\<?php echo e($questionsforum->replay1_pic); ?>" class="user-profile-image">
          <?php endif; ?>
        </div>
        <?php if(( !($questionsforum->replay1)==null)or( !($questionsforum->replay2)==null) ): ?>
        <div class="form-group">
          <label for="reply2">Reply 2</label>
          <input type="text" class="form-control"name="reply2" id="reply2" value="<?php echo e($questionsforum->replay2); ?>">
          <div class="form-group">
              <label for="qurp2_pic">Reply 2 image</label>
              <input type="file" class="form-control" name="qurp2_pic" id="qurp2_pic" accept="image/*" />
          </div>
          <?php if( (!($questionsforum->replay2_pic)==null)): ?>
          <img height="200" width="200" src="\image\question\reply\pic\<?php echo e($questionsforum->replay2_pic); ?>" class="user-profile-image">
          <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if( (!($questionsforum->replay2)==null) or( !($questionsforum->replay3)==null)): ?>
        <div class="form-group">
          <label for="reply3">Reply 3</label>
          <input type="text" class="form-control"name="reply3" id="reply3" value="<?php echo e($questionsforum->replay3); ?>">
          <div class="form-group">
              <label for="qurp3_pic">Reply 3 image</label>
              <input type="file" class="form-control" name="qurp3_pic" id="qurp3_pic" accept="image/*" />
          </div>
          <?php if( !($questionsforum->replay3_pic)==null): ?>
          <img height="200" width="200" src="\image\question\reply\pic\<?php echo e($questionsforum->replay3_pic); ?>" class="user-profile-image">
          <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if( (!($questionsforum->replay3)==null)or( !($questionsforum->replay4)==null) ): ?>
        <div class="form-group">
          <label for="reply4">Reply 4</label>
          <input type="text" class="form-control"name="reply4" id="reply4" value="<?php echo e($questionsforum->replay4); ?>">
          <div class="form-group">
              <label for="qurp4_pic">Item image</label>
              <input type="file" class="form-control" name="qurp4_pic" id="qurp4_pic" accept="image/*" />
          </div>
          <?php if( !($questionsforum->replay4_pic)==null): ?>
          <img height="200" width="200" src="\image\question\reply\pic\<?php echo e($questionsforum->replay4_pic); ?>" class="user-profile-image">
          <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if( (!($questionsforum->replay4)==null) or( !($questionsforum->replay5)==null)): ?>
        <div class="form-group">
          <label for="reply5">Reply 5</label>
          <input type="text" class="form-control"name="reply5" id="reply5" value="<?php echo e($questionsforum->replay2); ?>">
          <div class="form-group">
              <label for="qurp5_pic">Item image</label>
              <input type="file" class="form-control" name="qurp5_pic" id="qurp5_pic" accept="image/*" />
          </div>
          <?php if( !($questionsforum->replay5_pic)==null): ?>
          <img height="200" width="200" src="\image\reply\item\<?php echo e($questionsforum->replay5_pic); ?>" class="user-profile-image">
          <?php endif; ?>
        </div>
        <?php endif; ?>
        <input type="hidden" id="id" name="id" value="<?php echo e($questionsforum->id); ?>">
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
<?php echo $__env->make('patient.layouts.patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>