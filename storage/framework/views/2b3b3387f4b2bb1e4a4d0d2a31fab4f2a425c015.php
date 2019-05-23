<?php $__env->startSection('title', "Patient Management"); ?>
<?php
    
use Illuminate\Support\Facades\DB;
$email=auth()->user()->email;

$IDs = DB::table('patient')->where('email', $email)->get();
$IDpa = 0;
        foreach($IDs as $ID)
        {
            $IDpa=$ID->id;
            
        }
        $diagnosise = DB::select('select * from diagnosis where patientname ='.$IDpa);
        $patientname='n';
            $service='n';
            $consultant_dr='n';
            $discription='n';
            $hight='n';
            $weight='n';
            $skech='n';


?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
        <thead> 
        <tr>
            <th>DID</th>
            <th>Patient name</th>
            <th>Service</th>
            <th>Doctor name</th>
            <th>Actions<?php echo e($IDpa); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $diagnosise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnosis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr> 
                <td><?php echo e($diagnosis->Did); ?></td>
                <td><?php echo e($diagnosis->patientname); ?></td>
                <td><?php echo e($diagnosis->service); ?></td>
                <td><?php echo e($diagnosis->consultant_dr); ?></td>
                <td>
                    <a class="btn btn-xs btn-primary" href="<?php echo e(route('patient.diagnosis.show',[$diagnosis->id])); ?>">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<div class="pull-right">
</div>
</div>
    
        <a href="<?php echo e(route('patient.patients')); ?>" class="btn btn-danger">Patient home</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('patient.layouts.patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>