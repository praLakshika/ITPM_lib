<?php $__env->startSection('title', "Doctor Management"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table border="0" cellspacing="0" width="100%" class="doctortable">
            <table>
                <tr>

                    <th>Actions</th>
                    <div class="demptable">
                        <a href="<?php echo e(route('admin.doctors.add')); ?>" class="btn btn-primary">Add Doctor</a>
                        <a href="<?php echo e(route('admin.doctors.report')); ?>" class="btn btn-primary">Report</a>
                        <form action="doctorsearch" method="post" role="search">
                            <?php echo e(csrf_field()); ?>


                            <input type="text" placeholder="Search Doctor" name="q">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>

                    </div>

                </tr>
            </table>
            <br/>
            <br/>
            <div class="row">
                <?php if(Session::has('message')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>

                <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xs-6 col-sm-3">

                        <div class="dcard">
                            <div class="row">
                                <div class="dcard-header">
                                    <div class="dcard-body text-center">
                                        <span class="dcard-title" style="font-size: large; color: white"><?php echo e($doctor->name); ?></span><br />
                                    </div>
                                    <br/>
                                    <div class="dcard-body text-center">
                                        <img src="\image\doc\profile\<?php echo e($doctor->doc_pic); ?>" alt="Pic" height="90" width="90"class="img-circle">
                                    </div>

                                    
                                    <br/>
                                </div>
                            </div>
                            <div class="dcard-body text-center">
                                <?php echo Form::open(array('route' => ['admin.doctor.delete', $doctor->id], 'method' => 'DELETE')); ?>

                                <a href="<?php echo e(route('admin.doctors.show', [$doctor->id])); ?>" class="btn btn-primary">View</a>
                                <br/>
                                <a href="<?php echo e(route('admin.doctors.edit', [$doctor->id])); ?>" class="btn btn-success">Update</a>
                                
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