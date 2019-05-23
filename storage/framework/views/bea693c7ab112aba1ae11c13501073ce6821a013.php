<head>

</head>
<?php $__env->startSection('title',"Doctor Report Generate ", "Doctor"); ?>
<body>
<?php $__env->startSection('content'); ?>
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i>Total Doctors</span>
            <div class="count green"><?php echo e($counts['Doctors']); ?></div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i>Total Hospitals </span>
            <div class="count green"><?php echo e($counts['hospital']); ?></div>
        </div>
    </div>
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <h1>Period Report Genarate</h1>
        <form action="report" method="post">

            <?php echo e(csrf_field()); ?>


            <div class="form-row">


                <div class="col">
                    <label for="inputAddress">Starting From</label>
                    <input type="date" name="from_date" class="form-control" id="inputAddress" value="">
                </div>
                <div class="col">
                    <label for="inputAddress">End Date</label>
                    <input type="date" name="to_date" class="form-control" id="inputAddress" value="">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Genarate</button>
                </div>
            </div>

        </form>



        
            
                
                    
                        
                        
                            
                        
                    
                
            
        
        
    
</body>
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