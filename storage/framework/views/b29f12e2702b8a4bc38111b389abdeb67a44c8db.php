<?php $__env->startSection('title', __('views.admin.users.show.title', ['name' => $employee->name])); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th><?php echo e(__('views.admin.users.show.table_header_0')); ?></th>
               
                
                <img  id="myImg" onclick="displayIMG(this.id)"  src="\image\emp\profile\<?php echo e($employee->emp_pic); ?>" alt=<?php echo e($employee->name); ?> style="width:100%;max-width:200px">
                <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                  </div>
                  
                  
            </tr>

            <tr>
                <th><?php echo e(__('views.admin.users.show.table_header_1')); ?></th>
                <td><?php echo e($employee->name); ?></td>
            </tr>

            <tr>
                <th>Employee Type</th>
                <td>
                    
                    <?php echo e($employee->employeeType); ?>

                    
                </td>
            </tr>

            <tr>
                <th>NIC</th>
                <td>
                    <?php echo e($employee->nic); ?>

                </td>
            </tr>

            <tr>
                <th>Address</th>
                <td>
                    <?php echo e($employee->address); ?>

                </td>
            </tr>
            <tr>
                <th>Birthday</th>
                <td>
                    <?php echo e($employee->birthday); ?>

                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <?php echo e($employee->email); ?>

                </td>
            </tr>
            <tr>
                <th>Contact Number</th>
                <td>
                    <?php echo e($employee->contactNo); ?>

                </td>
            </tr>
            <tr>
                <th>Initial Salary</th>
                <td>
                    <?php $__currentLoopData = $initial_salary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($item->basic_salary); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
            </tr>

            <tr>
                <th>Created At</th>
                <td><?php echo e($employee->created_at); ?> (<?php echo e($employee->created_at->diffForHumans()); ?>)</td>
            </tr>

            <tr>
                <th>Updated At</th>
                <td><?php echo e($employee->updated_at); ?> (<?php echo e($employee->updated_at->diffForHumans()); ?>)</td>
            </tr>

            <tr>
                <th></th>
                <td><a href="<?php echo e(URL::previous()); ?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a></td>
                
            </tr>
            </tbody>
        </table>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');
        // var img=document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
       
          function displayIMG(clicked_id)
        {
            modal.style.display = "block";
            modalImg.src = document.getElementById(clicked_id).src;
            captionText.innerHTML =document.getElementById(clicked_id).alt;
        }  
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
            modal.style.display = "none";
        }
        </script>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>