<?php $__env->startSection('title', "Store"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th><?php echo e(__('views.admin.users.show.table_header_0')); ?></th>
                <td><img height="200" width="200" src="\image\store\item\<?php echo e($stores->pic); ?>" class="user-profile-image"></td>
            </tr>

            <tr>
                <th>Item name</th>
                <td><?php echo e($stores->iteamname); ?></td>
            </tr>

            <tr>
                <th>Item company</th>
                <td>
                        <?php echo e($stores->company); ?>

                    </a>
                </td>
            </tr>
            <tr>
                <th>Item quantity</th>
                <td>
                    <?php echo e(($stores->iteam_quantity)); ?> <?php echo e(($stores->quantity_type)); ?>

                </td>
            </tr>
            <tr>
                <th>Item maximum</th>
                <td>
                        <?php echo e(($stores->iteam_max)); ?><?php echo e(($stores->quantity_type)); ?>

                        
                </td>
            </tr>
            <tr>
                <th>Item minimum</th>
                <td>
                        <?php echo e(($stores->iteam_min)); ?><?php echo e(($stores->quantity_type)); ?>

                        
                </td>
            </tr>
            
            </tbody>
        </table>
        <a href="<?php echo e(route('admin.store')); ?>" class="btn btn-danger">Store home</a>
        <a class="btn btn-info" href="<?php echo e(route('admin.store.edit',[$stores->id])); ?>">Edit</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>