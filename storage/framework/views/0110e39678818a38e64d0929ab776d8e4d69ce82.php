<?php $__env->startSection('title', "Book Management"); ?>

<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('admin/css/userstyles.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                

                    <div class="demptable">
                       <div class="right-searchbar">
                                <!-- Search form -->
                                <form action="searchBook" method="post" class="form-inline">
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

                    
            </tr>
            </thead>
        </table>
        <?php if(Session::has('message')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <?php
    
        use Illuminate\Support\Facades\DB;
        $email=auth()->user()->email;
        ?>
            <div class="row">
                <?php $__currentLoopData = $Books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                $IDs = DB::table('book_author')->where('id', $Book->authorid)->get();
                $author_name = "pandding";
                        foreach($IDs as $ID)
                        {
                            $author_name=$ID->name;
                            
                        }
                
                ?>
            <div class="col-xs-6 col-sm-3">
                <div class="dcard">
                    <div class="row">
                        <div class="dcard-header">
                            <div class="dcard-body text-center" style="font-size: larger; color: white">
                                <span class="dcard-title "><?php echo e($Book->bookname); ?></span><br />
                                <span class="dcard-title "><?php echo e($author_name); ?></span><br />
                            </div>
                        <br/>
                            <div class="dcard-body text-center">
                                <img src="\image\book\pic\<?php echo e($Book->book_pic); ?>" alt="Pic" height="90" width="90"class="img-circle">
                            </div>
                         

                        </div>
                    </div>
                    <div class="dcard-body text-center">
                        <a class="btn btn-xs btn-primary" href="<?php echo e(route('patient.book.show',[$Book->id])); ?>">
                            <i class="fa fa-eye"></i>
                        </a>
                       
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="pull-right">
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/dashboard.css'))); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('member.layouts.member', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>