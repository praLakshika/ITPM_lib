<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            <?php $__env->startSection('title', "Book fine fee Management "); ?>
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
                
            <div class="right-searchbar">
                <!-- Search form -->
                <form action="Msearchfine" method="post" class="form-inline">
                        <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <input class="form-control" type="text" name="key" required placeholder="Search" aria-label="Search" value="<?php echo e(isSet($key) ? $key : ''); ?>" />
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
                <th>Book name</th>
                <th>Member</th>
                <th>find fee</th>
            </tr>
            </thead>
            <?php
            use Illuminate\Support\Facades\DB;
            use Carbon\Carbon;
            ?>
            <tbody>
                    <?php $__currentLoopData = $Book_fine_collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Book_fine_collectio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                            <?php
                            $email=auth()->user()->email;
                            $members = DB::table('member')->where('email', $email)->get();
      
                            $book_issues = DB::select('select * from book_issue where id ='.$Book_fine_collectio->book_issued_id);
                            $bookname="panding";
                            $membername=null;
                            $mytime = Carbon::now();
                            foreach($book_issues as $book_issue)
                            {
                                $bookname=$book_issue->book_id;
                                $membername=$book_issue->member_id;
                            }
                            $booknames = DB::select('select * from book where id ='.$bookname);
                            
                            foreach($members as $member)
                            {
                                $membername=$member->name;
                            }
                            foreach($booknames as $booknam)
                            {
                                $bookname=$booknam->bookname;
                                // $bookid=$bookname->id;
                            }
                            ?>
                            <?php if( $membername!=null): ?>
                            <td><?php echo e($Book_fine_collectio->id); ?></td>
                            <td><?php echo e($bookname); ?></td>
                            <td><?php echo e($membername); ?></td>
                            <td>Rs. <?php echo e($Book_fine_collectio->find_fee); ?>.00</td>    
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
<?php echo $__env->make('member.layouts.member', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>