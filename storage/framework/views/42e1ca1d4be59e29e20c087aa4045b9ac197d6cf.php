<?php $__env->startSection('title',"Add an Employee", "Employee"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <?php echo Form::open(array('route' => 'admin.employees.store','enctype' =>'multipart/form-data')); ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="form-group">
            
            <?php echo Form::label('name', 'Name'); ?>

            
            <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('nic', 'NIC'); ?>

            <?php echo Form::text('nic',  null, ['class' => 'form-control', 'placeholder'=>'Without V']); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('email', 'Email'); ?>

            <?php echo Form::email('email',  null, ['class' => 'form-control', 'placeholder'=>'Valid email']); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('contactNo', 'Contact Number'); ?>

            <?php echo Form::text('contactNo',  null, ['class' => 'form-control', 'placeholder'=>'Mobile number']); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('employeeType', 'Employee Type'); ?>

            <?php echo Form::select('employeeType', ['Director' => 'Director', 'Receptionist' => 'Receptionist', 'PNO'=> 'PNO'], null, ['placeholder' => 'Choose...', 'class'=> 'form-control']); ?>

            
        </div>
        <div class="container">
            <div class="form-group">
                <?php echo Form::label('birthday', 'Birthday'); ?>

                <?php echo Form::date('birthday', null, ['class'=> 'form-control']); ?>

                
            </div>
        </div>
        <div class="container">
            <div class="form-group">
                <?php echo Form::label('emp_pic', 'Profile picture'); ?>

                <?php echo Form::file('emp_pic',  ['class'=> 'form-control','accept' =>'image/*']); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo Form::label('address', 'Address'); ?>

            <?php echo Form::textarea('address', null, ['class'=> 'form-control']); ?>

            
        </div>
        <a href="<?php echo e(route('admin.employees')); ?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a>
        <?php echo Form::button('Clear', ['type' => 'reset', 'class' => 'btn btn-danger']); ?>

        <?php echo Form::button('Add', ['type' => 'submit', 'class' => 'btn btn-primary']); ?>

        
      <?php echo Form::close(); ?>

    </div>
    <div class="container"></div>
</div>
</div>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');
    
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/users/edit.css'))); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <?php echo e(Html::script(mix('assets/admin/js/users/edit.js'))); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>