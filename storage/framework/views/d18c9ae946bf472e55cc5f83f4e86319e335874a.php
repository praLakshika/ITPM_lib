<?php $__env->startSection('content'); ?>
    <!-- page content -->
    <!-- top tiles -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>
                            LimbCare(PVT) LTD. Management System
                        </h3>
                    </div>
                </div>
                
                <div class="x_content">
                    <div class="col-md-12">
                        <div class="jcarousel">
                                <ul style="left: 0px; top: 0px;">
                                    <li><img src="http://www.artificiallimbcare.lk/img/bg-img/bg2.jpg" alt="" width="600" height="400"></li>
                                    <li><img src=".http://www.artificiallimbcare.lk/img/bg-img/bg1.jpg" alt="" width="600" height="400"></li>
                                    <li><img src="http://www.artificiallimbcare.lk/img/bg-img/bg3.jpg" alt="" width="600" height="400"></li>
                                </ul>
                                
                                <p class="jcarousel-pagination" data-jcarouselpagination="true"><a href="#1" class="active">1</a><a href="#2">2</a><a href="#3">3</a></p>
                            
                        </div>

                    </div>
                    <div class="col-md-12 text-center jcarousel-control">
                        <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                        <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <?php echo e(Html::script(mix('assets/admin/js/dashboard.js'))); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/dashboard.css'))); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('doctor.layouts.doctor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>