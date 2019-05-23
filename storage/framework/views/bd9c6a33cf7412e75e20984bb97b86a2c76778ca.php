<?php $__env->startSection('title',"Add an Quotation"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addquotation" method="post" enctype="multipart/form-data">
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
            <label for="pronounced">Pronounced *</label>
            <select name="pronounced" class="form-control" >
                <option  disabled>Select one</option>
                <option  value="Mr">Mr</option>
                <option  value="Mr">Ms</option>
                <option  value="Mr">Miss</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gender">Pronounced *</label>
            <select name="gender" class="form-control" >
                <option  disabled>Select one</option>
                <option  value="Sir">Sir</option>
                <option  value="Madam">Madam </option>
            </select>
        </div>
        <div class="form-group">
            <label for="pa_name">Date *</label>
            <input type="text" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo e(old('date')); ?>" required>
        </div>
        <div class="form-group">
            <label for="pa_name">Patient Name *</label>
            <input type="text" class="form-control" name="pa_name" id="pa_name" placeholder="Patient Name" value="<?php echo e(old('pa_name')); ?>" required>
        </div>
        <div class="form-group">
            <label for="address">Address *</label>
            <textarea class="form-control" name="address" id="address" cols="30" rows="10" placeholder="Patient Address" required><?php echo e(old('address')); ?></textarea>
          </div>
        
        <div class="form-group">
            <label for="service_name">Divice *</label>
            <input type="text" class="form-control" name="divice" id="divice" placeholder="Divice" value="<?php echo e(old('divice')); ?>" required>
        </div>
       
        <div class="form-group">
            <label for="service_name">Diagnosis *</label>
            <input type="text" class="form-control" name="diagnosis" id="diagnosis" placeholder="Diagnosis" value="<?php echo e(old('diagnosis')); ?>" required>
        </div>
       
        <div class="form-group">
            <label for="service_name">Prescription *</label>
            <input type="text" class="form-control" name="prescription" id="prescription" placeholder="Prescription" value="<?php echo e(old('prescription')); ?>" required>
        </div>
       
        <div class="form-group">
            <label for="service_name">Warranty *</label>
            <input type="text" class="form-control" name="warranty" id="warranty" placeholder="Warranty" value="<?php echo e(old('warranty')); ?>" required>
        </div>
        <div class="form-group">
            <label for="service_name">Delivery date *</label>
            <input type="text" class="form-control" name="delivery" id="delivery" placeholder="Delivery date" value="<?php echo e(old('delivery')); ?>" required>
        </div> <div class="form-group">
            <label for="service_name">Price *</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo e(old('price')); ?>" required>
        </div> <div class="form-group">
            <label for="service_name">Price validity *</label>
            <input type="text" class="form-control" name="price_v" id="price_v" placeholder="Price validity " value="<?php echo e(old('price_v')); ?>" required>
        </div>
         <div class="form-group">
            <label for="service_name">Payment method *</label>
            <input type="text" class="form-control" name="payment_m" id="payment_m" placeholder="Payment method" value="<?php echo e(old('payment_m')); ?>" required>
        </div>
        
       
        
        <input type="hidden" id="empID" name="empID" value="<?php echo e($emp); ?>">
        <a href="<?php echo e(route('admin.quotation')); ?>" class="btn btn-danger">Cancel</a>
        <a href="<?php echo e(route('admin.quotation.add')); ?>" class="btn btn-primary">Clear</a>
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