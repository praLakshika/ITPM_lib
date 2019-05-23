<?php $__env->startSection('content'); ?>
<div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Store Management"); ?>
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="<?php echo e(route('admin.store.add')); ?>" class="btn btn-primary">Add Item</a>
            </div>
            <div class="right-searchbar">
                <!-- Search form --> 
                <form action="searchstore" method="post" class="form-inline active-cyan-3">
                    <?php echo e(csrf_field()); ?>

                    <input type="text" placeholder="Search store" name="search" class="form-control form-control-sm ml-3 w-100" required>
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
                
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div id="log_activity" class="dashboard_graph">
                        <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                            <div class="x_title">
                                <h3> Quantity Items</h3>
                                <div class="clearfix"></div>
                            </div>
                            <form action="storereport" method="post">

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
                            <?php $__currentLoopData = $storeR; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stores): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 col-sm-12 col-xs-6">
                                <div>
                                    <h3>Iteam name</h3>
                                    <h4><?php echo e($stores->iteamname); ?></h4>
                                    <?php
                                    $max=$stores->iteam_max;
                                    $now=$stores->iteam_quantity;
                                    $percentage=$now/$max*100;
                                    $numberAsString = number_format($percentage, 2);
                                    ?>
                                    <div class="">
                                            <div class="progress mb-2">
                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?php echo e($numberAsString); ?>%" aria-valuenow="<?php echo e($numberAsString); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="text-primary bg-primary"><?php echo e($numberAsString); ?>%</span>
                                    </div>
                                </div>
  
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
        
                        <div class="clearfix"></div>
                    </div>
                </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>