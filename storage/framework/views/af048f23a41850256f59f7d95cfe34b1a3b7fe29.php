<?php $__env->startSection('content'); ?>
<div class="row title-section">
    <div class=".col-xs-12 .col-sm-6 .col-lg-8">
        <?php $__env->startSection('title', "Generate Appointment Report"); ?>
    </div>
    <div class="row"></div>
    <div class="col-xs-6 col-sm-3">
            <div class="row">
                <?php echo Form::open(array('route' => 'admin.appointments.rep', 'enctype' =>'multipart/form-data', 'class' => 'form-group')); ?>

                    <?php echo Form::token(); ?>

                    <div class="form-group">
                        <?php echo Form::date('created_date', null, ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::date('to_date', \Carbon\Carbon::now(), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::select('sort_by', ['date' => 'date', 'time' => 'time', 'type' => 'type', 'name' => 'name'], 'date', ['class' => 'form-control']); ?>

                    </div>
                    <?php echo Form::submit('Create Report', ['class' => 'btn btn-primary']); ?>   
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</body>
</html>
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