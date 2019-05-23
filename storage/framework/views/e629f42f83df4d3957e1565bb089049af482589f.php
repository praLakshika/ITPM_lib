<?php $__env->startSection('content'); ?>
<div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Store Management"); ?>
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="<?php echo e(route('admin.store.add')); ?>" class="btn btn-primary">Add Item</a>
                <a href="<?php echo e(route('admin.store.report')); ?>" class="btn btn-primary">Report</a>
            </div>
            
            <div class="right-searchbar">
                    <!-- Search form -->
                    <form action="searchstore" method="post" class="form-inline">
                            <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input class="form-control" type="text" name="search" placeholder="Search store" aria-label="Search" required />
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                        </div>
                        
                    </form>
                </div>
        </div>
    </div>
    <div class="row">
            <?php if($store->isEmpty()): ?>
            <div class="alert alert-danger" role="alert">
                <p>Not have Data in service table</p>
            </div>
        <?php else: ?>
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Item name</th>
                        <th>company</th>
                        <th>Item max</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                            <?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stores): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr> 
                                <td><?php echo e($stores->id); ?></td>
                                <td><?php echo e($stores->iteamname); ?></td>
                                <td><?php echo e($stores->company); ?></td>
                                <td><?php echo e($stores->iteam_max); ?><?php echo e(($stores->quantity_type)); ?></td>
                                <td>
                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.store.show',[$stores->id])); ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.store.edit',[$stores->id])); ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-warning" href="<?php echo e(route('admin.store.plus',[$stores->id])); ?>">
                                    <i class="fa fa-plus-square"></i>
                                </a>
                                <a class="btn btn-xs btn-dark" href="<?php echo e(route('admin.store.minus',[$stores->id])); ?>">
                                    <i class="fa fa-minus-square"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" href="<?php echo e(route('admin.store.delete',[$stores->id])); ?>">
                                    <i class="fa fa-trash"></i>
                                </a>
                                
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php endif; ?>
        <div class="pull-right">
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>