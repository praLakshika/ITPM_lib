<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Service Management"); ?>
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            
            <div class="right-searchbar">
                
            </div>
        </div>
    </div>
    <?php
use Illuminate\Support\Facades\DB;
$email=auth()->user()->email;

$IDs = DB::table('patient')->where('email', $email)->get();
$IDpa = 0;
foreach($IDs as $ID)
{
$IDpa=$ID->id;

}
// $services = DB::select('select * from service ');
//

?>
    <div class="row">
        
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xs-6 col-sm-3">
                <div class="card">
                    <div class="row">
                        <div class="card-header" style="margin-top: 20px; margin-bottom: 20px;">
                            <div class="col-xs-6 col-md-4 col-lg-4 vcenter emp-avator" style="height: 90px; width: 90px;" >
                                <img src="\image\service\item\<?php echo e($service->pic); ?>" alt="Pic" height="90px" width="90px">
                            </div>
                            
                            <div class="col-xs-6 col-md-8 col-lg-8 vcenter emp-details">
                                <span class="text-primary bg-primary">Service name </span><br />
                                <span class="text-light bg-success"><?php echo e($service->serviceName); ?></span><br />
                                <span class="text-primary bg-primary">Service type</span><br />
                                <span class="text-light bg-success"><?php echo e($service->type); ?></span><br />
                                <span class="text-light bg-primary"> Service description</span><br />
                
                                <span class="text-light bg-success"><?php echo e($service->description); ?></span>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('doctor.layouts.doctor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>