<?php $__env->startSection('title', "Question Forum Management"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody> 
            <?php $__currentLoopData = $Question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Questions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!strcmp(($Questions->questionPic),'nophoto')==0): ?>
            <tr>
                <th>Image</th>
                <td><img style="height:auto;width:auto;max-width:200px;max-height:200px;"  src="\image\question\pic\<?php echo e($Questions->questionPic); ?>" class="user-profile-image imgdis" id=<?php echo e($Questions->id); ?> onclick="displayIMG(this.id)"></td>
            </tr>
            <?php endif; ?>
            <tr>
                <th>Question title</th>
                <td><?php echo e($Questions->questionTitle); ?></td>
            </tr>
            <tr>
                <th>Question </th>
                <td><?php echo e($Questions->question); ?></td>
            </tr>
           
           <?php $__currentLoopData = $replys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replyw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php if(!strcmp(($replyw->replay_pic),'nophoto')==0): ?>
           <tr>
                <th>Image of reply</th> 
                <td><img style="height:auto;width:auto;max-width:200px;max-height:200px;" src="\image\reply\pic\<?php echo e($replyw->replay_pic); ?>" class="user-profile-image imgdis" id=<?php echo e($replyw->id); ?> onclick="displayIMG(this.id)"></td>
            </tr>
            <?php endif; ?>
           <tr>
                <th>Reply</th>
                <td><?php echo e($replyw->replay); ?></td>
            </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tr>
                    <th></th><td>
            <?php if(!$errors->isEmpty()): ?>
            
            <div class="alert alert-danger" role="alert">
                <?php echo $errors->first(); ?>

            </div>
        </td>
             </tr>
        <?php endif; ?>
            
            
            
        </table>
        <a href="<?php echo e(route('patient.question_forum')); ?>" class="btn btn-danger">Questions Forum home</a>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
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
<?php echo $__env->make('patient.layouts.patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>