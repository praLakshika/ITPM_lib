<?php $__env->startSection('title',"Book fine fee Management"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="fine_feeupdate" method="post">
    <?php echo e(csrf_field()); ?>

    <?php if(!$errors->isEmpty()): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errors->first(); ?>

        </div>
    <?php endif; ?>
                            <?php
                            use Illuminate\Support\Facades\DB;
                            use Carbon\Carbon;
                            $booksadd = DB::select('select * from book where id ='.$fee->bookcatid);
                            $bookname="panding";
                            $mytime = Carbon::now();
                            foreach($booksadd as $bookadd)
                            {
                                $bookname=$bookadd->bookname;
                            }
                           
                            ?>
    <?php if(Session::has('message')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
        <div class="form-group">
                <label for="name">Book name *</label>
                <h3><?php echo e($bookname); ?></h3>
              </div>
              <div class="form-group">
                <label for="fee_per_day">Book fine fee *</label>
                <input type="text" class="form-control" name="fee_per_day" id="fee_per_day" value="<?php echo e($fee->fee_per_day); ?>">
              </div>
        <input type="hidden" id="id" name="id" value="<?php echo e($fee->id); ?>">
        <a href="<?php echo e(route('admin.fine_fee')); ?>" class="btn btn-danger">Cancel</a>
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