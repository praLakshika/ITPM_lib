<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="site_title">
                <span><?php echo e(config('app.name')); ?></span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                
                <img src="http://203.157.229.35/sis/img/user_icon.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2><?php echo e(auth()->user()->name); ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                
                <ul class="nav side-menu">
                    <li>
                        
                        <a href="<?php echo e(route('admin.dashboard')); ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Management</h3>

                
                <?php ($emp = ''); ?>
                <?php ($app = ''); ?>
                <?php ($stor = ''); ?> 
                <?php ($qf = ''); ?> 
                
                <?php if(!empty($employee)): ?>
                    <?php if(isset($employee[0])): ?>
                        <?php ($emp = $employee[0]->id); ?>
                    <?php elseif(isset($employee)): ?>
                        <?php ($emp = $employee->id); ?>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(!empty($appointment)): ?>
                    <?php ($app = $appointment->id); ?>
                <?php endif; ?>
                <?php if(!empty($stores)): ?>
                    <?php ($stor = $stores->id); ?>
                <?php endif; ?>
                <?php if(!empty($questionsforum)): ?>
                    <?php if(!empty($questionsforum->id)): ?>
                        <?php ($qf =  $questionsforum->id); ?>
                    <?php endif; ?>
                <?php endif; ?> 

                <ul class="nav side-menu">
                    <li class="<?php if(Request::is('admin/employees/add') || Request::is('admin/employees/'.$emp.'/edit') || Request::is('admin/employees/'.$emp)): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('admin.member')); ?>">
                            <i class="fas fa-id-badge" aria-hidden="true"></i>
                            <?php echo e("Member"); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('admin/financial')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('admin.online_book')); ?>">
                            <i class="fas fa-file-pdf-o" aria-hidden="true"></i>
                            <?php echo e("Online book"); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('admin/diagnosis') || Request::is('admin/diagnosis/add')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('admin.book')); ?>">
                            <i class="fas fa-book" aria-hidden="true"></i>
                            <?php echo e("Book"); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.book_issue')); ?>">
                            <i class="fas fa-book-reader " aria-hidden="true"></i>
                            <?php echo e("Book issue"); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('admin/appointments/add') || Request::is('admin/appointments/'.$app.'/edit') || Request::is('admin/appointments/'.$app)): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('admin.fine_collection')); ?>">
                            <i class="fas fa-money" aria-hidden="true"></i>
                            <?php echo e("Fine collection"); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.author')); ?>">
                            <i class="fas fa-pen-nib" aria-hidden="true"></i>
                            <?php echo e("Author"); ?>

                        </a>
                    </li>
                   
                </ul>
            </div>
            
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
