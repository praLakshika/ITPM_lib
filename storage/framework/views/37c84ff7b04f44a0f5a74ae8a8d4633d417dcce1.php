<?php $__env->startSection('content'); ?>
<div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Diagnosis Report"); ?>


    <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div id="log_activity" class="dashboard_graph">
                        <div class="col-md-3 col-sm-3 col-xs-12 bg-white">

                            <form action="direpo" method="post">

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

                        </div>
        
                        <div class="clearfix"></div>
                    </div>
                </div>
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