<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            <?php $__env->startSection('title', "Appointments"); ?>
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
            <div class="topicbar">
                
                <?php echo e(link_to_route('admin.appointments.add', 'Add Appointment', null, ['class' => 'btn btn-primary'])); ?>

                <?php echo e(link_to_route('admin.appointments.report', 'Create Report', null, ['class' => 'btn btn-primary'])); ?>

            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                <form action="<?php echo e(route('admin.appointments')); ?>" method="get" class="form-inline">
                    <div class="form-group">
                        <input class="form-control" type="text" name="key" placeholder="Search" aria-label="Search" value="<?php echo e(isSet($key) ? $key : ''); ?>" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if(Session::has('message')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
            <thead> 
            <tr>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Did', "DID",['page' => '']));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('date', "Date",['page' => '']));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('time', "Time",['page' => '']));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', "Name",['page' => '']));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('type', "Type",['page' => '']));?></th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($appointment->Did); ?></td>
                        <td><?php echo e($appointment->date); ?></td>
                        <td><?php echo e($appointment->time); ?></td>
                        <td><?php echo e($appointment->name); ?></td>
                        <td><?php echo e($appointment->type); ?></td>
                        <td>
                            
                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.appointments.show', [$appointment->id])); ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.appointments.edit', [$appointment->id])); ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" onclick="return confirm('Will be permanently deleted?')" href="<?php echo e(route('admin.appointments.delete', $appointment->id)); ?>">
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

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style('assets/admin/css/my_style.css')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>