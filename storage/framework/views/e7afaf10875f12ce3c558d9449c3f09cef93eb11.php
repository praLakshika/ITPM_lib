<?php $__env->startSection('title', __('views.admin.users.show.title', ['name' => $appointment->name])); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            

            <tr>
                <th>Name</th>
                <td><?php echo e($appointment->name); ?></td>
            </tr>

            <tr>
                <th>Type</th>
                <td>
                    
                    <?php echo e($appointment->type); ?>

                    
                </td>
            </tr>

            <tr>
                <th>Date</th>
                <td>
                    <?php echo e($appointment->date); ?>

                </td>
            </tr>

            <tr>
                <th>Time</th>
                <td>
                    <?php echo e($appointment->time); ?>

                </td>
            </tr>
            <tr>

            <tr>
                <th>Created At</th>
                <td><?php echo e($appointment->created_at); ?> (<?php echo e($appointment->created_at->diffForHumans()); ?>)</td>
            </tr>

            <tr>
                <th>Updated At</th>
                <td><?php echo e($appointment->updated_at); ?> (<?php echo e($appointment->updated_at->diffForHumans()); ?>)</td>
            </tr>

            <tr>
                <th></th>
                <td><a href="<?php echo e(URL::previous()); ?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a></td>
                
            </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('patient.layouts.patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>