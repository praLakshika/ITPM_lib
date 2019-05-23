<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Financial Management"); ?>
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="<?php echo e(route('admin.financial.add_bill')); ?>" class="btn btn-success">Add Bill</a>
                <a href="<?php echo e(route('admin.financial.index_invoice')); ?>" class="btn btn-primary">Invoice</a>
                <a href="<?php echo e(route('admin.financial')); ?>" class="btn btn-danger">Back to Financial </a>
            </div>
            <div class="right-searchbar">
                    <!-- Search form -->
                    <form action="searchbill" method="post" class="form-inline">
                            <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input class="form-control" type="text" name="search" placeholder="Search Bill" aria-label="Search" required />
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
            <h4>Bills</h4>
            
            <?php if(Session::has('message')): ?>compact('patients'),compact('Invoices')
                <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
            <?php endif; ?>
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                    width="100%">
                <thead> 
                <tr>
                    <th>ID</th>
                    <th>Total  Amount</th>
                    <th>Amount</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                                <?php
                                $reamont='no';
                                $amont='no';
                                foreach ($Invoices as $Invoice)
                                {
                                    $amont= $Invoice->amount;
                                    $reamont= $bill->amount;
                                }
                                ?>
                            <td><?php echo e($bill->id); ?></td>
                            
                            <td><?php echo e($amont); ?></td>
                            <td><?php echo e($reamont); ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.financial.showBill', [$bill->id])); ?>">
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