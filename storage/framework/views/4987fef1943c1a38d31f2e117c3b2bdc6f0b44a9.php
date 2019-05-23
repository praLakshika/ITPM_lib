<?php $__env->startSection('title', "Member Management"); ?>

<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('admin/css/userstyles.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                

                    <div class="demptable">
                        <?php echo e(link_to_route('admin.patient.add', 'Add member', null, ['class' => 'btn btn-primary'])); ?>

                        
                        <div class="right-searchbar">
                                <!-- Search form -->
                                <form action="search" method="post" class="form-inline">
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

            <div class="row">
                

            <div class="col-xs-6 col-sm-3">
                <div class="dcard">
                    <div class="row">
                        <div class="dcard-header">
                            <div class="dcard-body text-center" style="font-size: larger; color: white">
                                <span class="dcard-title "></span><br />
                                <span class="dcard-title "></span><br />
                            </div>
                        <br/>
                            <div class="dcard-body text-center">
                                <img src="\image\pat\profile\" alt="Pic" height="90" width="90"class="img-circle">
                            </div>
                            

                        </div>
                    </div>
                    <div class="dcard-body text-center">
                        
                        <a href="" class="btn btn-primary">View</a>
                        <br/>
                        <a href="" class="btn btn-success">Update</a>
                        <a href=" " class="btn btn-danger">Delete</a>
                        
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
            

        <div class="pull-right">
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/dashboard.css'))); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>