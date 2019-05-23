<?php $__env->startSection('title', "Patient Management"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr> 
                <th><h4>Primary sketch</h4></th>
                <td>
                    <img height="200" width="200" class="imgdis"  id="<?php echo e($diagnosis->Did); ?>" onclick="displayIMG(this.id)"  src="\image\diagnosis\sketch\<?php echo e($diagnosis->skech); ?>" alt=<?php echo e($diagnosis->patientname); ?> style="width:100%;max-width:200px">
                    <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                      </div>
                </tr>
                <?php
                
use Illuminate\Support\Facades\DB;
                $diagnosise = DB::select('select * from patient where id ='.$diagnosis->patientname );
          foreach($diagnosise as $diagnosiss)
          {
            $diagnosis->patientname=$diagnosiss->name;
          }
          ?>
               
                <tr>
                    <th>Patient name</th>
                    <td><?php echo e($diagnosis->patientname); ?></td>
                </tr>
            <tr>
                    <th>Patient Did</th>
                    <td><?php echo e($diagnosis->Did); ?></td>
                </tr>

            <tr>
                <th>Patient service</th>
                <td>
                        <?php echo e($diagnosis->service); ?>

                    </a>
                </td>
            </tr>
            <tr>
                <th>Discription</th>
                <td>
                    <?php echo e($diagnosis->discription); ?>

                </td>
            </tr>
            <tr>
                <th>Consultant doctor</th>
                <td>
                        <?php echo e(($diagnosis->consultant_dr)); ?>

                        
                </td>
            </tr>
            <tr>
                <th>Hight</th>
                <td>
                        <?php echo e(($diagnosis->hight)); ?> cm
                        
                </td>
            </tr>
            <tr>
                <th>Weight</th>
                <td>
                        <?php echo e(($diagnosis->weight)); ?> kg
                        
                </td>
            </tr>
            
            </tbody>
        </table>
        <?php
        $DSphoto =DB::select('select * from diagnosisphoto WHERE diagnosis_ID ='.$diagnosis->id.'');  
        
        ?>
         <div class="container">
        <?php $__currentLoopData = $DSphoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DSphotos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
          <div class="  col-lg-3 text-center">
            <div class="panel panel-success ">
                <div class="panel-heading " style="text-align: justify;">
                    
                    <p style="text-align:center;"> 
                        <img height="200" width="200"  class="imgdis" id=<?php echo e($DSphotos->id); ?> onclick="displayIMG(this.id)"  src="\image\diagnosis\sketch\other\<?php echo e($DSphotos->diagnosis_pic); ?>" alt="<?php echo e($DSphotos->discription); ?>" style="height:200px;width:200px;max-width:200px"></p>
                        <h4 align="center"><?php echo e($DSphotos->discription); ?></h4>        
            </div>
          </div>
          </div>

          
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
        <a href="<?php echo e(route('patient.diagnosis.index')); ?>" class="btn btn-danger">Diagnosis home</a>
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