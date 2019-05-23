<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Diagnosis Management"); ?>
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            
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
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Patient name</th>
                        <th>Service</th>
                        <th>Doctor name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $diagnosise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnosis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr> 
                            <td><?php echo e($diagnosis->id); ?></td>
                            <td><?php echo e($diagnosis->patientname); ?></td>
                            <td><?php echo e($diagnosis->service); ?></td>
                            <td><?php echo e($diagnosis->consultant_dr); ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('doctor.diagnosis.show',[$diagnosis->id])); ?>">
                                    <i class="fa fa-eye"></i>
                                
                                
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
        <div class="pull-right">
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('doctor.layouts.doctor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>