<?php $__env->startSection('title', __('views.admin.users.show.title', ['name' => $patient->name])); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th><?php echo e(__('views.admin.users.show.table_header_0')); ?></th>
                <td>
                     <img id="myImg" src="\image\pat\profile\<?php echo e($patient->pat_pic); ?>" alt="Snow" style="width:100%;max-width:200px">
                    <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                      </div>
                      
            </tr>

            <tr>
                <th><?php echo e(__('views.admin.users.show.table_header_1')); ?></th>
                <td><?php echo e($patient->name); ?></td>
            </tr>

            <tr>
                <th>E-Mail</th>
                <td>
                    
                    <?php echo e($patient->email); ?>

                    
                </td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>
                    
                    <?php echo e($patient->Gender); ?>

                    
                </td>
            </tr>

            <tr>
                <th>NIC</th>
                <td>
                    <?php echo e($patient->nic); ?>

                </td>
            </tr>

            <tr>
                <th>Address</th>
                <td>
                    <?php echo e($patient->address); ?>

                </td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td>
                    <?php echo e($patient->mobile); ?>

                </td>
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
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>