<?php $__env->startSection('title', "Financial  Management"); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    
                    <td><center><img src="\image\finacial\bill.png"  alt="Pic" height="90" width="90" class="user-profile-image"></center></td>
        
                </tr>
                
                <tr>
                    <th>Patient Name</th>
                    <td>
                       <h3> <?php echo e($array['name']); ?></h3>
                        
                    </td>
                </tr>
    
                <tr>
                    <th>Date</th>
                    <td><h3><?php echo e($financialBill->created_at); ?></h3></td>
                </tr>
    
                <tr>
                    <th>Bill amount</th>
                    <td>
                       <h3>Rs. <?php echo e($financialBill->amount); ?>.00</h3>
                    </td>
                </tr>
                
                
                <tr>
                    <th></th>
                    <td><a href="<?php echo e(URL::previous()); ?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a></td>
                    
                </tr>
                
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('patient.layouts.patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>