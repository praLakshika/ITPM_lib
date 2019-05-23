<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Question Forum Management"); ?>
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="<?php echo e(route('patient.question_forum.add')); ?>" class="btn btn-primary">Add Question</a>
            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                
            </div>
        </div>
    </div>
    <?php
    
use Illuminate\Support\Facades\DB;
$email=auth()->user()->email;

$IDs = DB::table('patient')->where('email', $email)->get();
$IDpa = 0;
        foreach($IDs as $ID)
        {
            $IDpa=$ID->id;
            
        }
        $questionsforum = DB::select('select * from question where  questionType="Patient" AND questionAsk ='.$IDpa);
        

?>
    <div class="row">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>title</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $questionsforum; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questionsforum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                                <td><?php echo e($questionsforum->id); ?></td>
                                <td><?php echo e($questionsforum->question); ?></td>
                                <td><?php echo e($questionsforum->questionTitle); ?></td>
                                
                            <td>
                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('patient.question_forum.show',[$questionsforum->id])); ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                                
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
        
    </div>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('patient.layouts.patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>