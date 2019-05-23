<?php $__env->startSection('title', "Author Management"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>Author Image</th>
                <td>
                        <img  id="myImg" onclick="displayIMG(this.id)" height="200" width="200" src="\image\author\pic\<?php echo e($Book_authors->pic); ?>" alt=<?php echo e($Book_authors->name); ?>>
                        <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                          </div>
                        
            </tr>
            
            <tr>
                <th>Author name</th>
                <td><?php echo e($Book_authors->name); ?></td>
            </tr>
            
            <tr>
                <th>Author birthday</th>
                <td><?php echo e($Book_authors->birthday); ?></td>
            </tr>
            
            <tr>
                <th>Author address</th>
                <td><?php echo e($Book_authors->address); ?></td>
            </tr>
            
            <tr>
                <th>Author email</th>
                <td><?php echo e($Book_authors->email); ?></td>
            </tr>
            
            <tr>
                <th>Author contact</th>
                <td><?php echo e($Book_authors->contact); ?></td>
            </tr>
            </tbody>
        </table>
        <a href="<?php echo e(route('admin.author')); ?>" class="btn btn-danger">Online Book home</a>
        <a class="btn btn-info" href="<?php echo e(route('admin.author.edit',[$Book_authors->id])); ?>">Edit</a>
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