<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('admin/css/userstyles.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                
                   


            </tr>
            </thead>
        </table>
        <div class="col-12 col-md-8">
            <?php $__env->startSection('title', "Patient Management"); ?>
            </div>
    <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="<?php echo e(route('doctor.diagnosis.index')); ?>" class="btn btn-primary"> diagnosis card</a>
            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                
            </div>
        </div>
        <?php if(Session::has('message')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>

            <div class="row">
                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-xs-6 col-sm-3">
                <div class="dcard">
                    <div class="row">
                        <div class="dcard-header">
                            
                        <br/>
                            <div class="dcard-body text-center">
                                <img src="\image\pat\profile\<?php echo e($patient->pat_pic); ?>" alt="Pic" height="90" width="90"class="img-circle">
                            </div>
                            <div class="dcard-body text-center" style="font-size: larger; color: white">
                                <span class="dcard-title ">Name :<?php echo e($patient->name); ?></span><br />
                                <span class="dcard-title ">mobile :<?php echo e($patient->mobile); ?></span><br />
                                <span class="dcard-title ">address :<?php echo e($patient->address); ?></span><br />
                            </div>
                            

                        </div>
                    </div>
                    
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="pull-right">
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/dashboard.css'))); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('doctor.layouts.doctor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>