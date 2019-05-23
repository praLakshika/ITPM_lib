<?php $__env->startSection('title', "Patient Management"); ?>

<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('admin/css/userstyles.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                

                    <div class="demptable">
                        <?php echo e(link_to_route('admin.diagnosis.index', 'Diagnosis Card', null, ['class' => 'btn btn-warning'])); ?>

                        <?php echo e(link_to_route('admin.patient.add', 'Add Patient', null, ['class' => 'btn btn-primary'])); ?>

                        <?php echo e(link_to_route('admin.patient.chartView', 'Report', null, ['class' => 'btn btn-primary'])); ?>

                        <div class="right-searchbar">
                                <!-- Search form -->
                                <form action="patientsearch" method="post" class="form-inline">
                                        <?php echo e(csrf_field()); ?>

                                    <div class="form-group">
                                        <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search" required />
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                                    </div>
                                    
                                </form>
                            </div>
                        
                    </div>

                    
            </tr>
            </thead>
        </table>
        <?php if(Session::has('message')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>

            <div class="row">
                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-xs-6 col-sm-3">
                <div class="dcard">
                    <div class="row">
                        <div class="dcard-header">
                            <div class="dcard-body text-center" style="font-size: larger; color: white">
                                <span class="dcard-title "><?php echo e($patient->name); ?></span><br />
                                <span class="dcard-title "><?php echo e($patient->Did); ?></span><br />
                            </div>
                        <br/>
                            <div class="dcard-body text-center">
                                <img src="\image\pat\profile\<?php echo e($patient->pat_pic); ?>" alt="Pic" height="90" width="90"class="img-circle">
                            </div>
                            

                        </div>
                    </div>
                    <div class="dcard-body text-center">
                        <?php echo Form::open(array('route' => ['admin.patient.delete', $patient->id], 'method' => 'DELETE')); ?>

                        <a href="<?php echo e(route('admin.patient.show', [$patient->id])); ?>" class="btn btn-primary">View</a>
                        <br/>
                        <a href="<?php echo e(route('admin.patient.edit', [$patient->id])); ?>" class="btn btn-success">Update</a>
                        
                        <?php echo Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']); ?>

                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="pull-right">
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/dashboard.css'))); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>