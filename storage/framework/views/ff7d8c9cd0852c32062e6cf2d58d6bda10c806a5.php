<?php $__env->startSection('title',"Store", "Store"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updatequotation" method="post">
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
        <label for="pa_name">Date *</label>
        <input type="text" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo e($Quotation->date); ?>" required>
    </div>
    <div class="form-group">
        <label for="pa_name">Patient Name *</label>
        <input type="text" class="form-control" name="pa_name" id="pa_name" placeholder="Patient Name" value="<?php echo e($Quotation->name); ?>" required>
    </div>
    <div class="form-group">
        <label for="address">Address *</label>
        <textarea class="form-control" name="address" id="address" cols="30" rows="10" placeholder="Patient Address" required><?php echo e($Quotation->address); ?></textarea>
      </div>
    
    <div class="form-group">
        <label for="service_name">Divice *</label>
        <input type="text" class="form-control" name="divice" id="divice" placeholder="Divice" value="<?php echo e($Quotation->divice); ?>" required>
    </div>
   
    <div class="form-group">
        <label for="service_name">Diagnosis *</label>
        <input type="text" class="form-control" name="diagnosis" id="diagnosis" placeholder="Diagnosis" value="<?php echo e($Quotation->diagnosis); ?>" required>
    </div>
   
    <div class="form-group">
        <label for="service_name">Prescription *</label>
        <input type="text" class="form-control" name="prescription" id="prescription" placeholder="Prescription" value="<?php echo e($Quotation->prescription); ?>" required>
    </div>
   
    <div class="form-group">
        <label for="service_name">Warranty *</label>
        <input type="text" class="form-control" name="warranty" id="warranty" placeholder="Warranty" value="<?php echo e($Quotation->warranty); ?>" required>
    </div>
    <div class="form-group">
        <label for="service_name">Delivery date *</label>
        <input type="text" class="form-control" name="delivery" id="delivery" placeholder="Delivery date" value="<?php echo e($Quotation->deliverydate); ?>" required>
    </div> <div class="form-group">
        <label for="service_name">Price *</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo e($Quotation->price); ?>" required>
    </div> <div class="form-group">
        <label for="service_name">Price validity *</label>
        <input type="text" class="form-control" name="price_v" id="price_v" placeholder="Price validity " value="<?php echo e($Quotation->pricevalidity); ?>" required>
    </div>
     <div class="form-group">
        <label for="service_name">Payment method *</label>
        <input type="text" class="form-control" name="payment_m" id="payment_m" placeholder="Payment method" value="<?php echo e($Quotation->paymentmethod); ?>" required>
    </div>
    
        <input type="hidden" id="id" name="id" value="<?php echo e($Quotation->id); ?>">
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