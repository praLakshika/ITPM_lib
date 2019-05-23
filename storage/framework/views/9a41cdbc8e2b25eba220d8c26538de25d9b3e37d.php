<?php $__env->startSection('title',"Book issue Management"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="returnbook" method="post">
    <?php echo e(csrf_field()); ?>

    <?php if(!$errors->isEmpty()): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errors->first(); ?>

        </div>
    <?php endif; ?>
    <?php
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    $booksadd = DB::select('select * from book where id ='.$books->book_id);
    $members = DB::select('select * from member where id ='.$books->member_id);
    $bookname="panding";
    $mytime = Carbon::now();
    foreach($booksadd as $bookadd)
    {
        $bookname=$bookadd->bookname;
    }
    $membername="panding";
    foreach($members as $member)
    {
        $membername=$member->name;
    }
    ?>
    <?php if(Session::has('message')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
    <div class="form-group">
            <label for="book_name">Book Name *</label>
            <h3><?php echo e($bookname); ?></h3>
        </div>
        <div class="form-group">
            <label for="book_name">Member Name *</label>
            <h3><?php echo e($membername); ?></h3>
        </div>
        <div class="form-group">
            <label for="book_year">Book return date *</label>
        <h3><?php echo e($mytime->toDateString()); ?></h3>
        </div>
        <input type="hidden" id="id" name="id" value="<?php echo e($books->id); ?>">
        <input type="hidden" id="return" name="return" value="<?php echo e($mytime->toDateString()); ?>">
        
        <a href="<?php echo e(route('admin.book_issue')); ?>" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Return</button>
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