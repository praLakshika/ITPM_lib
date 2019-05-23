<?php $__env->startSection('title',  "Other Pay ID: " . $financialOtherPayment->id); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td><center><img src="\image\finacial\otherpayment.png"  alt="Pic" height="90" width="90" class="user-profile-image"></center></td>
                </tr>
                <tr>
                    <th>ID</th>
                    <td>
                        
                        <?php echo e($financialOtherPayment->id); ?>

                        
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
                        <?php echo e($financialOtherPayment->descrption); ?>

                    </td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>
                        <?php echo e($financialOtherPayment->amount); ?>

                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><a href="<?php echo e(URL::previous()); ?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a></td>
                    
                    
                </tr>
                <tr><th></th><td>
                           <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.financial.edit_otherpay', [$financialOtherPayment->id])); ?>">
                                <font size="+2"><i class="fa fa-edit"></i></font></a>
                </td> </tr>   
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>