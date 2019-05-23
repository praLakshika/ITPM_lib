<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            <?php $__env->startSection('title', "Employee Management"); ?>
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
            <div class="topicbar form-group">
                
                <?php echo e(link_to_route('admin.employees.add', 'Add Employee', null, ['class' => 'btn btn-primary'])); ?>

                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">
                    Generate Report
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">  
                            <?php echo Form::open(array('route' => 'admin.employees.rep', 'enctype' =>'multipart/form-data', 'class' => 'form-inline')); ?>

                            <?php echo Form::token(); ?>

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Download Employees report</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="created_date" class="col-form-label">From:</label>
                                    <?php echo Form::date('created_date', null, ['class' => 'form-control']); ?>

                                </div>
                                <div class="form-group">
                                    <label for="to_date" class="col-form-label">To:</label>
                                    <?php echo Form::date('to_date', \Carbon\Carbon::now(), ['class' => 'form-control']); ?>

                                </div>
                                <div class="form-group">
                                    <label for="sort_by" class="col-form-label">Sort By:</label>
                                    <?php echo Form::select('sort_by', ['name' => 'name', 'email' => 'email', 'employeeType' => 'Employee Type'], 'name', ['class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <?php echo Form::submit('Generate', ['class' => 'btn btn-info', 'style' => 'margin-top: 10px;']); ?>

                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                <form action="<?php echo e(route('admin.employees')); ?>" method="get" class="form-inline">
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
        
        <div class="row">
            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xs-6 col-sm-3">
                    <div class="dcard">
                        <div class="row">
                            <div class="dcard-header">
                                <div class="dcard-body text-center" style="font-size: larger; color: black">
                                    <span class="dcard-title "><?php echo e($employee->name); ?></span><br />
                                    <span class="dcard-title "><?php echo e($employee->Did); ?></span><br />
                                </div>
                            <br/>
                                <div class="dcard-body text-center">
                                        <img src="\image\emp\profile\<?php echo e($employee->emp_pic); ?>" alt="Pic" height="90" width="90"class="img-circle">
                                     </div>
                                
    
                            </div>
                        </div>
                        <div class="dcard-body text-center">
                            <?php echo Form::open(array('route' => ['admin.employees.delete', $employee->id], 'method' => 'DELETE')); ?>

                            <a href="<?php echo e(route('admin.employees.show', [$employee->id])); ?>" class="btn btn-primary">View</a>
                            <br/>
                            <?php if(auth()->user()->usertype != 'administrator'): ?>
                            <a href="<?php echo e(route('admin.employees.edit', [$employee->id])); ?>" class="btn btn-success">Update</a>
                            
                           
                            <?php echo Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']); ?>

                            <?php echo Form::close(); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                                 
                                 
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
        </div>
        <div class="pull-right">
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style('assets/admin/css/my_style.css')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>