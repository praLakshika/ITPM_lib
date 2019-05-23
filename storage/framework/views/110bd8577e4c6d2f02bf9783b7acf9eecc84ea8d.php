<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            <?php $__env->startSection('title', "Employee Management"); ?>
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
            <div class="topicbar">
            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                <form class="form-inline active-cyan-3">
                    <input class="form-control form-control-sm ml-3 w-100" type="text" placeholder="Search" aria-label="Search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if(Session::has('message')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <div class="row">
            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xs-6 col-sm-3">
                    <div class="card">
                        <div class="row">
                            <div class="card-header">
                                <div class="col-xs-6 col-md-4 col-lg-4 vcenter emp-avator">
                                    <img src="\image\emp\profile\<?php echo e($employee->emp_pic); ?>" alt="Pic" height="90" width="90"class="img-circle">
                                </div>
                                
                                <div class="col-xs-6 col-md-8 col-lg-8 vcenter emp-details">
                                    <span class="card-title"><?php echo e($employee->name); ?></span><br />
                                    <span class="card-subtitle"><?php echo e($employee->employeeType); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                                <a href="<?php echo e(route('receptionist.employees.show', [$employee->id])); ?>" class="btn btn-link">View</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="pull-right">
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style('assets/admin/css/my_style.css')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('employee.receptionist.layouts.receptionist', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>