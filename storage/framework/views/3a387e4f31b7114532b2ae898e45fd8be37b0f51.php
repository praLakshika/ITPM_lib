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