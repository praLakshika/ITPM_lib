<?php $__env->startSection('title',"Add an Appointment", "Appointment"); ?> 

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

?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="alert alert-warning" role="alert">
        <ul>
            <li><?php echo e('Appointmets cannot be allocate within Today.'); ?></li>
            <li><?php echo e('Allocate appointment within Limb Care(PVT) working hours(08.30 AM to 05.00 PM)'); ?></li>
        </ul>
    </div>
    <div class="form-group">
        <?php echo Form::label('name', 'Patient Name'); ?>

       
        <h3><?php echo e($name); ?></h3>
    </div>
    <div class="form-group">
        <?php echo Form::open(array('route' => 'patient.appointments.checkDate')); ?>

            <?php echo Form::label('date', 'Date'); ?>

            <?php echo Form::date('date', null, ['class' => 'form-control', 'min'=>date('Y-m-d')]); ?>

            <?php echo Form::button('Check Date', ['type' => 'submit', 'class' => 'btn btn-primary']); ?>

        <?php echo Form::close(); ?>

    </div>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
        
    <?php echo Form::open(array('route' => 'patient.appointments.checkDate.store')); ?>

        <?php echo Form::hidden('date', null); ?>

        
        <?php ($_1 = ''); ?><?php ($_2 = ''); ?><?php ($_3 = ''); ?><?php ($_4 = ''); ?><?php ($_5 = ''); ?><?php ($_6 = ''); ?>
        <?php ($_7 = ''); ?><?php ($_8 = ''); ?><?php ($_9 = ''); ?><?php ($_10 = ''); ?><?php ($_11 = ''); ?><?php ($_12 = ''); ?>
        <?php ($_13 = ''); ?>
        <div class="form-group">
            <?php echo Form::label('time', 'Select a available time slot:'); ?>

            <select class = 'form-control' name='time'>
                <option value="" disabled selected>Select a available time slot</option>
                <?php if(isset($appointments)): ?>
                    <option value="09.00 - 09.30" 
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app == '09.00 - 09.30'): ?> <?php ($_1 = $app); ?> disabled <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >09.00 - 09.30 <?php if($_1 == "09.00 - 09.30"): ?> Taken <?php endif; ?> </option>
                    <option value="09.30 - 10.00" 
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app == '09.30 - 10.00'): ?> <?php ($_2 = $app); ?> disabled <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >09.30 - 10.00 <?php if($_2 == '09.30 - 10.00'): ?> Taken <?php endif; ?> </option>
                    <option value="10.00 - 10.30" 
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app == '10.00 - 10.30'): ?> <?php ($_3 = $app); ?> disabled <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >10.00 - 10.30 <?php if($_3 == '10.00 - 10.30'): ?> Taken <?php endif; ?> </option>
                    <option value="10.30 - 11.00" 
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app == '10.30 - 11.00'): ?> <?php ($_4 = $app); ?> disabled <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >10.30 - 11.00 <?php if($_4 == '10.30 - 11.00'): ?> Taken <?php endif; ?> </option>
                    <option value="11.00 - 11.30" 
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app == '11.00 - 11.30'): ?> <?php ($_5 = $app); ?> disabled <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >11.00 - 11.30 <?php if($_5 == '11.00 - 11.30'): ?> Taken <?php endif; ?> </option>
                    <option value="11.30 - 12.00" 
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app == '11.30 - 12.00'): ?> <?php ($_6 = $app); ?> disabled <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >11.30 - 12.00 <?php if($_6 == '11.30 - 12.00'): ?> Taken <?php endif; ?> </option>
                    <option value="01.30 - 02.00" 
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app == '01.30 - 02.00'): ?> <?php ($_7 = $app); ?> disabled <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >01.30 - 02.00 <?php if($_7 == '01.30 - 02.00'): ?> Taken <?php endif; ?> </option>
                    <option value="02.00 - 02.30" 
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app == '02.00 - 02.30'): ?> <?php ($_8 = $app); ?> disabled <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >02.00 - 02.30 <?php if($_8 == '02.00 - 02.30'): ?> Taken <?php endif; ?> </option>
                    <option value="02.30 - 03.00" 
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app == '02.30 - 03.00'): ?> <?php ($_9 = $app); ?> disabled <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >02.30 - 03.00 <?php if($_9 == '02.30 - 03.00'): ?> Taken <?php endif; ?> </option>
                    <option value="03.00 - 03.30" 
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app == '03.00 - 03.30'): ?> <?php ($_10 = $app); ?> disabled <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >03.00 - 03.30 <?php if($_10 == '03.00 - 03.30'): ?> Taken <?php endif; ?> </option>
                    <option value="03.30 - 04.00" 
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app == '03.30 - 04.00'): ?> <?php ($_11 = $app); ?> disabled <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >03.30 - 04.00 <?php if($_11 == '03.30 - 04.00'): ?> Taken <?php endif; ?> </option>
                    <option value="04.00 - 04.30" 
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app == '04.00 - 04.30'): ?> <?php ($_12 = $app); ?> disabled <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >04.00 - 04.30 <?php if($_12 == '04.00 - 04.30'): ?> Taken <?php endif; ?> </option>
                    <option value="04.30 - 05.00" 
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app == '04.30 - 05.00'): ?> <?php ($_13 = $app); ?> disabled <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >04.30 - 05.00 <?php if($_13 == '04.30 - 05.00'): ?> Taken <?php endif; ?> </option>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group">
            <?php echo Form::label('type', 'Appointment Type'); ?>

            <?php echo Form::select('type', ['Repair' => 'Repair', 'Checkup' => 'Checkup', 'New'=> 'New'], null, ['placeholder' => 'Choose...', 'class'=> 'form-control']); ?>

        </div>
        
        <?php echo Form::hidden('name', "$name"); ?>

        <a href="<?php echo e(route('patient.appointments')); ?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a>
        <?php echo Form::button('Clear', ['type' => 'reset', 'class' => 'btn btn-danger']); ?>

        <?php echo Form::button('Add', ['type' => 'submit', 'class' => 'btn btn-primary']); ?>

        
    <?php echo Form::close(); ?>

</div>
</div>

    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/users/edit.css'))); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <?php echo e(Html::script(mix('assets/admin/js/users/edit.js'))); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('patient.layouts.patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>