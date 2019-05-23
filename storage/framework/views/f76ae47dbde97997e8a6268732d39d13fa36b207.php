<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Question Forum Management"); ?>
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="<?php echo e(route('admin.question_forum.qareport')); ?>" class="btn btn-primary">Question Report</a>

            </div>
            <div class="right-searchbar">
                    <!-- Search form -->
                    <form action="searchquestion" method="post" class="form-inline">
                            <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search" required />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                        </div>
                        
                    </form>
                </div>
           
        </div>
    </div>
    <div class="row">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>title</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $questionsforum; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questionsforum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr><?php
                            $type=$questionsforum->questionType;
                            ?>
                                <td><?php echo e($questionsforum->id); ?></td>
                                <td><?php echo e($questionsforum->question); ?></td>
                                <td><?php echo e($questionsforum->questionTitle); ?></td>
                                <td><?php if($type=='doctor'): ?><span class="text-primary bg-primary"><?php echo e($questionsforum->questionType); ?> </span><br />
                                <?php else: ?><span class="text-primary btn-danger"><?php echo e($questionsforum->questionType); ?> <?php endif; ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.question_forum.show',[$questionsforum->id])); ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                                
                                <a class="btn btn-xs btn-warning" href="<?php echo e(route('admin.question_forum.reply',[$questionsforum->id])); ?>">
                                    <i class="fa fa-reply"></i>
                                </a>

                                <a class="btn btn-xs btn-danger" href="<?php echo e(route('admin.question_forum.delete',[$questionsforum->id])); ?>">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>