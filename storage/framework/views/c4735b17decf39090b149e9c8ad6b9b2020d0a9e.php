<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            <?php $__env->startSection('title', "Book fine fee Management "); ?>
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
           
            <div class="right-searchbar">
                <!-- Search form -->
                <form action="<?php echo e(route('admin.book_issue')); ?>" method="get" class="form-inline">
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
                <th>Book name</th>
                <th>Find fee per day</th>
                <th>Actions</th>
            </tr>
            </thead>
            <?php
            use Illuminate\Support\Facades\DB;
            use Carbon\Carbon;
            ?>
            <tbody>
               <?php $__currentLoopData = $Fine_fee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Fine_fe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                            <?php
                            $booksadd = DB::select('select * from book where id ='.$Fine_fe->bookcatid);
                            $bookname="panding";
                            $mytime = Carbon::now();
                            foreach($booksadd as $bookadd)
                            {
                                $bookname=$bookadd->bookname;
                            }
                           
                            ?>
                        <td><?php echo e($Fine_fe->id); ?></td>
                        <td><?php echo e($bookname); ?></td>
                        <td>Rs.<?php echo e($Fine_fe->fee_per_day); ?>.00</td>
                        <td>
                                    <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.fine_fee.edit',[$Fine_fe->id])); ?>">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
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