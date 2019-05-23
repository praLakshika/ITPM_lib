<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Diagnosis Management"); ?>
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="<?php echo e(route('admin.diagnosis.indexadd')); ?>" class="btn btn-primary">Add diagnosis card</a>
                <a href="<?php echo e(route('admin.diagnosis.DiaReport')); ?>" class="btn btn-primary">Diagnosis Report</a>

            </div>
            <div class="right-searchbar">
                    <!-- Search form -->
                    <form action="searchdiagnosis" method="post" class="form-inline">
                            <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input class="form-control" type="text" name="search" placeholder="Search diagnosis" aria-label="Search" required />
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
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>DID</th>
                        <th>Patient name</th>
                        <th>Service</th>
                        <th>Doctor name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $diagnosise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnosis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr> 
                            <td><?php echo e($diagnosis->Did); ?></td>
                            <td><?php echo e($diagnosis->patientname); ?></td>
                            <td><?php echo e($diagnosis->service); ?></td>
                            <td><?php echo e($diagnosis->consultant_dr); ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.diagnosis.show',[$diagnosis->id])); ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.diagnosis.edit',[$diagnosis->id])); ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" href="<?php echo e(route('admin.diagnosis.delete',[$diagnosis->id])); ?>">
                                    <i class="fa fa-trash"></i>
                                </a>
                                
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
        <div class="pull-right">
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>