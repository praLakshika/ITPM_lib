<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Financial Management (Add invoice)"); ?>
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="<?php echo e(route('admin.financial.index_bill')); ?>" class="btn btn-success"> Bill</a>
                <a href="<?php echo e(route('admin.financial.index_invoice')); ?>" class="btn btn-primary">Invoice</a>
                <a href="<?php echo e(route('admin.financial')); ?>" class="btn btn-danger">Back to Financial </a>
            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                <form action="searchbill" method="post" class="form-inline active-cyan-3">
                        <?php echo e(csrf_field()); ?>

                        <input type="text" placeholder="Search diagnosis" name="search" class="form-control form-control-sm ml-3 w-100" required>
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
            </div>
        </div>
    </div>
    <div class="row">
            <h4>Bills</h4>
            
            <?php if(Session::has('message')): ?>
                <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
            <?php endif; ?>
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                    width="100%">
                <thead> 
                <tr>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Patient NIC</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($patient->id); ?></td>
                            <td><?php echo e($patient->name); ?></td>
                            <td><?php echo e($patient->nic); ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.financial.newinvoice', [$patient->id])); ?>">
                                    <i class="fa fa-plus-circle"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>    
        </div>
       
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>