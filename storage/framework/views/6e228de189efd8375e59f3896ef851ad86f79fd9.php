<?php $__env->startSection('title',"Add finacial ", "Diagnosis"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-2">

    <form action="addbill" method="post">
<?php echo e(csrf_field()); ?>

            <h3>Bill</h3>
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
            <label for="bi_note">Invoice ID</label>
            <h3><?php echo e($invoice->id); ?></h3>
        </div>
        <div class="form-group">
            <label for="bi_note">Remaining amount</label>
            <h3>Rs. <?php echo e($invoice->remaining_amount); ?>.00</h3>
        </div>

        <div class="form-group">
            <label for="bi_am">Amount</label>
            <input type="text" class="form-control" name="bi_am" id="bi_am" placeholder="eg:-200000.00" >
            <input type="hidden" id="inID" name="inID" value="<?php echo e($invoice->id); ?>">
            <input type="hidden" id="empid" name="empid" value="<?php echo e($emp); ?>">
           
        </div>
        
        
        <a href="<?php echo e(route('admin.financial.index_bill')); ?>" class="btn btn-danger">Cancel</a>
        <a href="<?php echo e(route('admin.financial.addbillinvoice', [$invoice->id])); ?>" class="btn btn-primary">Clear</a>
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