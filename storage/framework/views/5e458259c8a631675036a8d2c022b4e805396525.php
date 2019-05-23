<?php $__env->startSection('title',  "Salary ID: " . $financialSalaryPayment->id); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td><center><img src="\image\finacial\payement.png"  alt="Pic" height="90" width="90" class="user-profile-image"></center></td>
                    
                </tr>
    
                <tr>
                    <th>Date</th>
                    <td><h5><?php echo e($financialSalaryPayment->date); ?></h5></td>
                </tr>
    
                <tr>
                    <th>Employee Name</th>
                    <td>
                        <?php
                         $name='no';
                            foreach($emp as $emps)
                            {
                                if($financialSalaryPayment->emp_id==$emps->id)
                                {
                                    $name=$emps->name;
                                }
                            }
                        ?>
                       <h5> <?php echo e($name); ?></h5>
                        
                    </td>
                </tr>
    
                <tr>
                    <th>Amount</th>
                    <td>
                      <h5> Rs. <?php echo e($financialSalaryPayment->amount); ?>.00</h5>
                    </td>
                </tr>
                <tr>
                <tr>
                    <th></th>
                    <td><a href="<?php echo e(URL::previous()); ?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a></td>
                    
                </tr>
                
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>