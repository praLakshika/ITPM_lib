<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Financial Management"); ?>
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="<?php echo e(route('admin.financial.index_bill')); ?>" class="btn btn-success"> Bill</a>
                <a href="<?php echo e(route('admin.financial.add_invoice')); ?>" class="btn btn-primary">Add Invoice</a>
                <a href="<?php echo e(route('admin.financial')); ?>" class="btn btn-danger">Back to Financial </a>

            </div>
            <div class="right-searchbar">
                    <!-- Search form -->
                    <form action="searchinvoice" method="post" class="form-inline">
                            <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input class="form-control" type="text" name="search" placeholder="Search invoice" aria-label="Search" required />
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                        </div>
                        
                    </form>
                </div>
            
        </div>
    </div>
    <div class="row">
            <h4>Invoice</h4>
            
            <?php if(Session::has('message')): ?>
                <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
            <?php endif; ?>
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                    width="100%">
                <thead> 
                <tr>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Amount</th>
                    <th>Remaining Amount</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $Invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php
                            $name='no';
                            foreach ($patients as $patient)
                            {
                            if($Invoice->patient_ID==$patient->id)
                            {
                                $name=$patient->name;
                            }
                            }
                            ?>
                            <td><?php echo e($Invoice->id); ?></td>
                            <td><?php echo e($name); ?></td>
                            <td><?php echo e($Invoice->amount); ?></td>
                            <td><?php echo e($Invoice->remaining_amount); ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.financial.showinvoice', [$Invoice->id])); ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                                
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>    
        </div>
       
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>