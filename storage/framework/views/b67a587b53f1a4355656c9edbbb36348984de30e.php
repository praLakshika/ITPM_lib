<?php $__env->startSection('title', __('views.admin.users.show.title', ['name' => $doctor->name])); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th><?php echo e(__('views.admin.users.show.table_header_0')); ?></th>
                <td>
                        <img height="200" width="200"  class="imgdis" id="<?php echo e($doctor->id); ?>"  onclick="displayIMG(this.id)" src="\image\doc\profile\<?php echo e($doctor->doc_pic); ?>" alt=<?php echo e($doctor->name); ?> style="width:100%;max-width:200px">
                    
                        <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                          </div>
            </tr>

            <tr>
                <th><?php echo e(__('views.admin.users.show.table_header_1')); ?></th>
                <td><?php echo e($doctor->name); ?></td>
            </tr>

            <tr>
                <th>Doctor Email</th>
                <td>
                    
                    <?php echo e($doctor->email); ?>

                    
                </td>
            </tr>

            <tr>
                <th>Hospital</th>
                <td>
                    <?php echo e($doctor->hospital); ?>

                </td>
            </tr>

            <tr>
                <th>Mobile</th>
                <td>
                    <?php echo e($doctor->mobile); ?>

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