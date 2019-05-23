<?php $__env->startSection('title', "Invoice ID: " . $Invoice->id); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    
                    <td><center><img src="\image\finacial\bill.png"  alt="Pic" height="90" width="90" class="user-profile-image"></center></td>
        
                </tr>
                <?php
                
                use Illuminate\Support\Facades\DB;
                
                $services=DB::select("select * from service WHERE id = ".$Invoice->service.";");
                foreach ($services as $service)
                {
                    $Invoice->service=$service->serviceName;
                }
                ?>
                <?php
                $name='no';
                $patintID='no';
                foreach ($patients as $patient)
                {
                if($Invoice->patient_ID==$patient->id)
                {
                    $name=$patient->name;
                    $patintID=$patient->id;
                }
                }?>
                <tr>
                    <th>Patient Name</th>
                    <td>
                        <?php echo e($name); ?>

                        
                    </td>
                </tr>
    
                <tr>
                    <th>Total amount</th>
                    <td><?php echo e($Invoice->amount); ?></td>
                </tr>
                <tr>
                    <th>Total service</th>
                    <td><?php echo e($Invoice->service); ?></td>
                </tr>
                <tr>
                    <th>Remaining amount</th>
                    <td>
                        <?php echo e($Invoice->remaining_amount); ?>

                    </td>
                </tr>
                <tr>
                        <tr>
                                <th>Print</th>
                                <td> 
                                    <form action="printinvoice" method="post">
                                            <?php echo e(csrf_field()); ?>

                                        <input type="hidden" id="inID" name="inID" value="<?php echo e($Invoice->id); ?>">
                                        <input type="hidden" id="reamount" name="reamount" value="<?php echo e($Invoice->remaining_amount); ?>">
                                        <input type="hidden" id="service" name="service" value="<?php echo e($Invoice->service); ?>">
                                        <input type="hidden" id="amount" name="amount" value="<?php echo e($Invoice->amount); ?>">
                                        <input type="hidden" id="patintID" name="patintID" value="<?php echo e($patintID); ?>">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                                    </form>
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
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>