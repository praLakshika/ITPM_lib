<?php $__env->startSection('title', "Service Management"); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
    <div class="container">
        <div class="col-xs-6 col-sm-6 col-lg-5" ></div>
        <div class="col-xs-5 col-sm-6 col-lg-5" ></div>
    </div>
    </div>
                    <div class="row" >
                            <div class="col-xs-6">
                                            <center> <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="\image\finacial\bill.png" alt="Card image cap" height="200" width="200"></center>
                                            <center><h2>Invoice </h2></center>
                                            <div class="row">
                                                   
                                                    
                                                    <?php if(Session::has('message')): ?>compact('patients'),compact('Invoices')
                                                        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
                                                    <?php endif; ?>
                                                    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="95%">
                                                        <thead> 
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Total  Amount</th>
                                                            <th>Amount</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                                <?php
                                                                
                                                            use Illuminate\Support\Facades\DB;
                                                            $email=auth()->user()->email;

                                                            $IDs = DB::table('patient')->where('email', $email)->get();
                                                            $IDpa = 0;
                                                                foreach($IDs as $ID)
                                                                {
                                                                    $IDpa=$ID->id;
                                                                    
                                                                }
                                                             $billsd=DB::select('select * from invoice WHERE `patient_ID` ='.$IDpa);

                                                                ?>
                                                             <?php $__currentLoopData = $billsd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                       
                                                                    <td><?php echo e($Invoice->id); ?></td>
                                                                    
                                                                    <td><?php echo e($Invoice->amount); ?></td>
                                                                    <td><?php echo e($Invoice->remaining_amount); ?></td>
                                                                    <td>
                                                                        <a class="btn btn-xs btn-primary" href="<?php echo e(route('patient.financial.showinvoice', [$Invoice->id])); ?>">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                        
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                        </tbody>
                                                    </table>    
                                                </div>
                                          
                                      
                            </div>
                            <div class="col-xs-6">
                                           <center> <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="\image\finacial\payement.png" alt="Card image cap" height="200" width="200"></center>
                                            <center><h2>Bill</h2> </center>
                                            <div class="row">
                                                   
                                                    
                                                    <?php if(Session::has('message')): ?>compact('patients'),compact('Invoices')
                                                        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
                                                    <?php endif; ?>
                                                    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="95%">
                                                        <thead> 
                                                        <tr><th> </th>
                                                            <th>ID</th>
                                                            <th>Bill  Amount</th>
                                                            <th>Remaining Amount</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                                <?php
                                                                
                                                                $email=auth()->user()->email;
    
                                                                $IDs = DB::table('patient')->where('email', $email)->get();
                                                                $IDpa = 0;
                                                                    foreach($IDs as $ID)
                                                                    {
                                                                        $IDpa=$ID->id;
                                                                        
                                                                    }
                                                                 $billsd=DB::select('select * from invoice WHERE `patient_ID` ='.$IDpa);
                                                                
                                                                    ?>
                                                            <?php $__currentLoopData = $billsd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                       
                                                                        <?php
                                                                        $id='no';
                                                                        $amont='no';
                                                                        $billsde=DB::select('select * from bill WHERE `invoice_id` ='.$bill->id);
                                                                
                                                                        foreach ($billsde as $billsd)
                                                                        {
                                                                            $id= $billsd->id;
                                                                            $amount= $billsd->amount;
                                                                        }
                                                                        ?>
                                                                         <?php if($id!="no"): ?>
                                                                        <td></td>
                                                                    <td><?php echo e($id); ?></td>
                                                                    <td><?php echo e($amount); ?></td>
                                                                    <td><?php echo e($bill->remaining_amount); ?></td>
                                                                    
                                                                    <td>
                                                                        <a class="btn btn-xs btn-primary" href="<?php echo e(route('patient.financial.showBill', [$id])); ?>">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                        
                                                                    </td>
                                                                </tr>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>    
                                                </div>
                                            </div>
                                            
                                        
                            </div>
                          </div>
                <?php $__env->stopSection(); ?>
<?php echo $__env->make('patient.layouts.patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>