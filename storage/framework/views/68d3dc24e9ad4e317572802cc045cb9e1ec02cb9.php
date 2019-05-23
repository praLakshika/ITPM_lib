<?php $__env->startSection('title', "Services Management"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>Services Image</th>
                <td>
                        <img  id="myImg" onclick="displayIMG(this.id)" height="200" width="200" src="\image\service\item\<?php echo e($Services->pic); ?>" alt=<?php echo e($Services->name); ?>>
                        <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                          </div>
                        
            </tr>

            <tr>
                <th>Services name</th>
                <td><?php echo e($Services->serviceName); ?></td>
            </tr>
            <tr>
                    <th>Services DID</th>
                    <td><?php echo e($Services->Did); ?></td>
                </tr>
            <tr>
                <th>Services type</th>
                <td>
                        <?php echo e($Services->type); ?>

                    </a>
                </td>
            </tr>
            <tr>
                <th>Services description</th>
                <td>
                    <?php echo e(($Services->description)); ?> 
                </td>
            </tr>
            </tbody>
        </table>
        <a href="<?php echo e(route('admin.services')); ?>" class="btn btn-danger">Store home</a>
        <a class="btn btn-info" href="<?php echo e(route('admin.services.edit',[$Services->id])); ?>">Edit</a>
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