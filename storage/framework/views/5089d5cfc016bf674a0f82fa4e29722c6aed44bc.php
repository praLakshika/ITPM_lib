<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            <?php $__env->startSection('title', "Book issue Management "); ?>
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
            <div class="topicbar">
                
                <?php echo e(link_to_route('admin.book_issue.add', 'Add Book issue', null, ['class' => 'btn btn-primary'])); ?>

            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                <form action="searchbookissue" method="post" class="form-inline">
                        <?php echo e(csrf_field()); ?>

                         <div class="form-group">
                        <input class="form-control" type="text" name="key" placeholder="Search" aria-label="Search" value="<?php echo e(isSet($key) ? $key : ''); ?>" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if(Session::has('message')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
            <thead> 
            <tr>
                <th>ID</th>
                <th>Member name</th>
                <th>Book name</th>
                <th>Get date</th>
                <th>Book issued day</th>
                <th>Actions</th>
            </tr>
            </thead>
            <?php
            use Illuminate\Support\Facades\DB;
            use Carbon\Carbon;
            ?>
            <tbody>
               <?php $__currentLoopData = $Book_issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Book_issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                            <?php
                            $booksadd = DB::select('select * from book where id ='.$Book_issue->book_id);
                            $members = DB::select('select * from member where id ='.$Book_issue->member_id);
                            $bookname="panding";
                            $mytime = Carbon::now();
                            foreach($booksadd as $bookadd)
                            {
                                $bookname=$bookadd->bookname;
                            }
                            $membername="panding";
                            foreach($members as $member)
                            {
                                $membername=$member->name;
                            }
                            ?>
                        <td><?php echo e($Book_issue->id); ?></td>
                        <td><?php echo e($membername); ?></td>
                        <td><?php echo e($bookname); ?></td>
                        <td><?php echo e($Book_issue->getdate); ?></td>
                        <td><?php echo e($Book_issue->book_issued_day); ?></td>
                        <td>
                            <?php if( ($Book_issue->book_returned_day)==null): ?>
                                
                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.book_issue.show',[$Book_issue->id])); ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.book_issue.return',[$Book_issue->id])); ?>">
                                    <i class="fas fa-undo"></i>
                                </a>
                            <?php else: ?>   
                            <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.book_issue.show',[$Book_issue->id])); ?>">
                                <i class="fa fa-eye"></i>
                            </a>

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

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style('assets/admin/css/my_style.css')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>