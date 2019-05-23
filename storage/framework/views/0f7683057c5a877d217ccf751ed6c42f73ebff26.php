<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Financial Salary Management"); ?>
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="<?php echo e(route('admin.financial.add_salaryindex')); ?>" class="btn btn-primary">Add Salary Payment</a>
                <a href="<?php echo e(route('admin.financial')); ?>" class="btn btn-danger">Back to Financial </a>
            </div>
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
            <h4>Salary Payments</h4>
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
                <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $financials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $financial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr><?php
                                $name='no';
                                   foreach ($emp as $emps)
                                   {
                                       if($emps->id==$financial->emp_id)
                                       {
                                           $name=$emps->name;
                                       }
                                    }
                               ?>
                            <td><?php echo e($financial->id); ?></td>
                            <td><?php echo e($name); ?></td>
                            <td><?php echo e($financial->created_at); ?></td>
                            <td><?php echo e($financial->amount); ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.financial.showSalary', [$financial->id])); ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                                
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
                </tbody>
        </div>
        </div>
        </div>
    
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>