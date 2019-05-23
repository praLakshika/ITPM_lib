<?php $__env->startSection('title', "Question Forum Management"); ?>
<?php
    
        use Illuminate\Support\Facades\DB;
        $email=auth()->user()->email;
        
        $IDs = DB::table('employees')->where('email', $email)->get();
        $emp = 0;
                foreach($IDs as $ID)
                {
                    $emp=$ID->id;
                    
                }
        
        ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody> 
            <?php $__currentLoopData = $Question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Questions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" id="id" name="id" value="<?php echo e($Questions->id); ?>">
            <?php if(!strcmp(($Questions->questionPic),'nophoto')==0): ?>
            <tr>
                <th>Image</th>
                <td><img height="200" width="200" src="\image\question\pic\<?php echo e($Questions->questionPic); ?>" class="user-profile-image"></td>
            </tr>
            <?php endif; ?>
            <tr>
                <th>Question title</th>
                <td><?php echo e($Questions->questionTitle); ?></td>
            </tr>
            <tr>
                <th>Question type</th>
                <td><?php echo e($Questions->questionType); ?></td>
            </tr>
           
           <?php $__currentLoopData = $replys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replyw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php if(!strcmp(($replyw->replay_pic),'nophoto')==0): ?>
           <tr>
                <th>Image foe reply</th>
                <td><img height="200" width="200" src="\image\reply\pic\<?php echo e($replyw->replay_pic); ?>" class="user-profile-image"></td>
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
            <form action="addreply" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

            <tr>
                <th>Reply image (option)</th>
                <td><input type="file" class="form-control" name="rep_pic" id="rep_pic" value="<?php echo e(old('replye')); ?>"></td>
            </tr>
            <tr>
                <th>Reply </th>
                <td><textarea class="form-control" name="replye" id="replye" cols="30" rows="10" placeholder="reply " ><?php echo e(old('replye')); ?></textarea></td>
            </tr>
            
        </table>
        <input type="hidden" id="q_id" name="q_id" value="<?php echo e($Questions->id); ?>">
        <input type="hidden" id="relier" name="relier" value="<?php echo e($emp); ?>">
        <a href="<?php echo e(route('admin.question_forum')); ?>" class="btn btn-danger">Questions Forum home</a>
        <button type="submit" class="btn btn-primary">Reply</button>
    </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>