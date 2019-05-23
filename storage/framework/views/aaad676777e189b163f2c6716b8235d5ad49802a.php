<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Book issue Management"); ?>
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            
                <div class="right-searchbar">
                        <!-- Search form -->
                        <form action="book_issue_book" method="post" class="form-inline">
                                <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <input class="form-control" type="text" name="search" placeholder="Search book" aria-label="Search" required />
                            </div>
                            <br>
                            <br>
                            <input type="hidden" id="memberID" name="memberID" value="<?php echo e($id); ?>">
                            <div class="form-group">
                                <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                            </div>
                            
                        </form>
                    </div>
            
        </div>
    </div>
   
    <div class="row">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="75%">
                    <thead> 
                    <tr>
                        <th>Book ID</th>
                        <th>Book name</th>
                        <th>Book available</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $Books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr> 
                            <td><?php echo e($Book->id); ?></td>
                            <td><?php echo e($Book->bookname); ?></td> 
                            <td><?php echo e($Book->book_quantity_now); ?></td> 
                            <td>
                                <?php if(($Book->book_quantity_now)<=0): ?>
                                    Book is not available
                                <?php else: ?>
                                <form action="book_issue_add" method="post" class="form-inline">
                                        <?php echo e(csrf_field()); ?>

                            <input type="hidden" id="memberID" name="memberID" value="<?php echo e($id); ?>">
                            <input type="hidden" id="bookID" name="bookID" value="<?php echo e($Book->id); ?>">

                            <div class="form-group">
                                    <button class="btn btn-xs btn-info" style="margin-top: -10px;" type="submit"><i class="fa fa-plus"></i></button>
                                </div>
                               
                            </form>
                            
                                <?php endif; ?>
                                    
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
        <div class="pull-right">
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>