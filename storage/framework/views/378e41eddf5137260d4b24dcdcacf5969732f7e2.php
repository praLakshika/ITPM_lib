<?php $__env->startSection('body_class','login'); ?>

<?php $__env->startSection('content'); ?>
    
<div class="flex-center position-ref ">
    <div class="top-left brand">
        <img src="img/art.png" alt="">
        <h1>Set new password</h1>
    </div>
</div>
                <?php
                
                use Illuminate\Support\Facades\DB;
                $Q1='no';
                $Q2='no';
                $Q3='no';
                $Q4='no';
                $Q5='no';
                $Q6='no';
                $Q7='no';
                $Q8='no';
                $Q9='no';
                $emailu="no";
                $questions=DB::select("select * from resetquestion");
                foreach ($questions as $question)
                {
                if($question->id==1)
                {
                    $Q1=$question->Question;
                }
                if($question->id==2)
                {
                    $Q2=$question->Question;
                }if($question->id==3)
                {
                    $Q3=$question->Question;
                }if($question->id==4)
                {
                    $Q4=$question->Question;
                }if($question->id==5)
                {
                    $Q5=$question->Question;
                }if($question->id==6)
                {
                    $Q6=$question->Question;
                }if($question->id==7)
                {
                    $Q7=$question->Question;
                }
                if($question->id==8)
                {
                    $Q8=$question->Question;
                }
                if($question->id==9)
                {
                    $Q9=$question->Question;
                }
                }?>
                
                
                       <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <form action="setreset" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                                <?php if(!$errors->isEmpty()): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errors->first(); ?>

                                    </div>
                                <?php endif; ?>
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="Email">Youre Email</label>
                                    <h2> <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($emailu=$user->email); ?>

                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></h2>
                                 </div>
                                <div class="form-group">
                                    <label for="Qt1">Question 1</label>
                                    <select name="Qt1" class="form-control" required>
                                            <option disabled selected value >Select Question</option>
                                            <option value="<?php echo e($Q1); ?>"><?php echo e($Q1); ?></option>
                                            <option value="<?php echo e($Q2); ?>"><?php echo e($Q2); ?></option>
                                            <option value="<?php echo e($Q3); ?>"><?php echo e($Q3); ?></option>
                                        </select>
                                     </div>
                                     <div class="form-group">
                                            <label for="inputAddress">Answer for Question 1</label>
                                            <input type="text" name="ANS1" class="form-control" id="ANS1"  required>
                                        </div>
                                <div class="form-group">
                                    <label for="Qt2">Question 2</label>
                                    <select name="Qt2" class="form-control" required >
                                            <option disabled selected value >Select Question</option>
                                            <option value="<?php echo e($Q4); ?>"><?php echo e($Q4); ?></option>
                                            <option value="<?php echo e($Q5); ?>"><?php echo e($Q5); ?></option>
                                            <option value="<?php echo e($Q6); ?>"><?php echo e($Q6); ?></option>
                                        </select>
                                     </div>
                                     <div class="form-group">
                                            <label for="inputAddress">Answer for Question 2</label>
                                            <input type="text" name="ANS2" class="form-control" id="ANS2" required >
                                         </div>
                                <div class="form-group">
                                        <label for="Qt3">Question 3</label>
                                        <select name="Qt3" class="form-control" required>
                                                <option  disabled selected value >Select Question</option>
                                                <option value="<?php echo e($Q7); ?>"><?php echo e($Q7); ?></option>
                                                <option value="<?php echo e($Q8); ?>"><?php echo e($Q8); ?></option>
                                                <option value="<?php echo e($Q9); ?>"><?php echo e($Q9); ?></option>
                                            </select>
                                         </div>
                                         <div class="form-group">
                                                <label for="inputAddress">Answer for Question 3</label>
                                                <input type="text" name="ANS3" class="form-control" id="ANS3"  required>
                                             </div>
                                             <input type="hidden" id="Email" name="Email" value="<?php echo e($emailu); ?>">
                                 <button type="submit" class="btn btn-primary">Add</button>
                              </form>
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
<?php echo $__env->make('auth.layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>