<?php $__env->startSection('title',"Add an Question", "Question"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addquesw" method="post" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>

<?php if(!$errors->isEmpty()): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $errors->first(); ?>

    </div>
<?php endif; ?>
<?php
    
use Illuminate\Support\Facades\DB;
$email=auth()->user()->email;

$IDs = DB::table('doctors')->where('email', $email)->get();
$IDpa = 0;
        foreach($IDs as $ID)
        {
            $IDpa=$ID->id;
        }
?>
<?php if(Session::has('message')): ?>
    <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
<div class="form-group">
        <label for="qu_title">Question title *</label>
        <input type="text" class="form-control" name="qu_title" id="qu_title" placeholder="what's....." value="<?php echo e(old('qu_title')); ?>">
    </div>
    
    <div class="form-group">
        <label for="qu_pic">Question image (optional)</label>
        <input type="file" class="form-control" name="qu_pic" id="qu_pic" >
    </div>
    <div class="form-group">
        <label for="question">Question *</label>
        <textarea class="form-control" name="question" id="question" cols="30" rows="10" placeholder="question " ><?php echo e(old('question')); ?></textarea>
    </div>
    <input type="hidden" id="qu_Type" name="qu_Type" value="doctor">
    <input type="hidden" id="qu_Ask" name="qu_Ask" value="<?php echo e($IDpa); ?>">
        <a href="<?php echo e(route('doctor.question_forum')); ?>" class="btn btn-danger">Cancel</a>
        <a href="<?php echo e(route('doctor.question_forum.add')); ?>" class="btn btn-primary">Clear</a>
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
<?php echo $__env->make('doctor.layouts.doctor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>