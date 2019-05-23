<?php $__env->startSection('title', "Question Forum Management"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody> 
            <?php $__currentLoopData = $Question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Questions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <th>Question </th>
                <td><?php echo e($Questions->question); ?></td>
            </tr>
           
           <?php $__currentLoopData = $replys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replyw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php if(!strcmp(($replyw->replay_pic),'nophoto')==0): ?>
           <tr>
                <th>Image of reply</th>
                <td><img height="200" width="200" src="\image\reply\pic\<?php echo e($replyw->replay_pic); ?>" class="user-profile-image"></td>
            </tr>
            <?php endif; ?>
           <tr>
                <th>Reply <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.question_forum.edit',[$replyw->id])); ?>">
                        <i class="fa fa-pencil"></i>
                    </a></th>
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
        <a href="<?php echo e(route('doctor.question_forum')); ?>" class="btn btn-danger">Questions Forum home</a>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('doctor.layouts.doctor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>