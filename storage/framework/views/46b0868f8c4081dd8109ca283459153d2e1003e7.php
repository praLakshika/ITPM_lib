<?php $__env->startSection('title', "Patient Management"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr> 
                <th><?php echo e(__('views.admin.users.show.table_header_0')); ?></th>
                <td><img height="200" width="200" src="\image\diagnosis\sketch\<?php echo e($diagnosise->skech); ?>" class="user-profile-image"></td>
            </tr>

            <tr>
                <th>Patient name</th>
                <td><?php echo e($diagnosise->patientname); ?></td>
            </tr>

            <tr>
                <th>Patient service</th>
                <td>
                        <?php echo e($diagnosise->service); ?>

                    </a>
                </td>
            </tr>
            <tr>
                <th>Discription</th>
                <td>
                    <?php echo e($diagnosise->discription); ?>

                </td>
            </tr>
            <tr>
                <th>Consultant doctor</th>
                <td>
                        <?php echo e(($diagnosise->consultant_dr)); ?>

                        
                </td>
            </tr>
            <tr>
                <th>Hight</th>
                <td>
                        <?php echo e(($diagnosise->hight)); ?> cm
                        
                </td>
            </tr>
            <tr>
                <th>Weight</th>
                <td>
                        <?php echo e(($diagnosise->weight)); ?> kg
                        
                </td>
            </tr>

            </tbody>
        </table>
        <a href="<?php echo e(route('doctor.diagnosis.index')); ?>" class="btn btn-danger">Diagnosis home</a>
       
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('doctor.layouts.doctor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>