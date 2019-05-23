<?php $__env->startSection('content'); ?>
    <?php
use Illuminate\Support\Facades\DB;
$email=auth()->user()->email;

$IDs = DB::table('patient')->where('email', $email)->get();
$IDpa = 0;
        foreach($IDs as $ID)
        {
            $IDpa=$ID->id;
            
        }
        $pation = DB::select('select * from patient where id ='.$IDpa);
        $name='n';
foreach($pation as $pations)
        {
            $name=$pations->name;
        }
        $appointments=DB::select('select * from appointments where name ="'.$name.'"');

?>
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            <?php $__env->startSection('title', "Appointments"); ?>
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
            <div class="topicbar">
                
                <?php echo e(link_to_route('patient.appointments.add', 'Add Appointment', null, ['class' => 'btn btn-primary'])); ?>

            </div>
            
        </div>
    </div>
    <div class="row">
        <?php if(Session::has('message')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
            <thead> 
            <tr>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id', "ID",['page' => '']));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('date', "Date",['page' => '']));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('time', "Time",['page' => '']));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', "Name",['page' => '']));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('type', "Type",['page' => '']));?></th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($appointment->id); ?></td>
                        <td><?php echo e($appointment->date); ?></td>
                        <td><?php echo e($appointment->time); ?></td>
                        <td><?php echo e($appointment->name); ?></td>
                        <td><?php echo e($appointment->type); ?></td>
                        <td>
                            
                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('patient.appointments.show', [$appointment->id])); ?>">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style('assets/admin/css/my_style.css')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('patient.layouts.patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>