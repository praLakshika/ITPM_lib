<?php $__env->startSection('title', "Patient Management"); ?>
<?php
use Illuminate\Support\Facades\DB;
$email=auth()->user()->email;
$IDs = DB::table('patient')->where('email', $email)->get();
$IDpa = 0;
foreach($IDs as $ID)
{
$IDpa=$ID->id;
}
$patients = DB::select('select * from doctors ');
//
?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <table border="0" cellspacing="0" width="100%" class="doctortable">
            <table>
                
            </table>
            <br/>
            <br/>
            <div class="row">
                <?php if(Session::has('message')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>

                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xs-6 col-sm-3">

                        <div class="dcard">
                            <div class="row">
                                <div class="dcard-header">
                                    <div class="dcard-body text-center">
                                        <span class="dcard-title" style="font-size: large; color: white">Name :<?php echo e($doctor->name); ?></span><br />
                                    </div>
                                    <div class="dcard-body text-center">
                                        <span class="dcard-title" style="font-size: large; color: white">hospital :<?php echo e($doctor->hospital); ?></span><br />
                                    </div>
                                    

                                    <br/>
                                    <div class="dcard-body text-center">
                                        <img src="\image\doc\profile\<?php echo e($doctor->doc_pic); ?>" alt="Pic" height="90" width="90"class="img-circle " id=<?php echo e($doctor->id); ?> onclick="displayIMG(this.id)">
                                    </div>
                                    <div id="myModal" class="modal">
                                        <span class="close">&times;</span>
                                    <img class="modal-content" id="img01">
                                    <div id="caption"></div>
                                  </div>
                                    
                                    <br/>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="pull-right">
                    
                </div>
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
<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/dashboard.css'))); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('patient.layouts.patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>