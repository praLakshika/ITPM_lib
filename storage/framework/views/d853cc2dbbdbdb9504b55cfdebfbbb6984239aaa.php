<div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="<?php echo e(route('pno.dashboard')); ?>" class="site_title">
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
                    <h3><?php echo e(auth()->user()->usertype); ?></h3>
                </div>
            </div>
            <!-- /menu profile quick info -->
    
            <br/>
    
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    
                    <ul class="nav side-menu">
                        <li>
                            
                            <a href="<?php echo e(route('pno.dashboard')); ?>">
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
                    
    
                    <ul class="nav side-menu">
                        <li class="<?php if(Request::is('pno/employees') || Request::is('pno/diagnosis/add')): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route('pno.employees')); ?>">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <?php echo e("Employees"); ?>

                            </a>
                        </li>
                        <li class="<?php if(Request::is('pno/diagnosis') || Request::is('pno/diagnosis/add')): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route('pno.patients')); ?>">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <?php echo e("Patients"); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('pno.doctors')); ?>">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <?php echo e("Doctors"); ?>

                            </a>
                        </li>
                        <li class="<?php if(Request::is('pno/appointments/add') || Request::is('pno/appointments/'.$app.'/edit') || Request::is('pno/appointments/'.$app)): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route('pno.appointments')); ?>">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <?php echo e("Appointments"); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('pno.services')); ?>">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <?php echo e("Services"); ?>

                            </a>
                        </li>
                        <li class="<?php if(Request::is('pno/store/add') || Request::is('pno/store/edit/'.$stor) || Request::is('pno/store/'.$stor)): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route('pno.store')); ?>">
                                <i class="fa fa-sitemap" aria-hidden="true"></i>
                                <?php echo e("Store"); ?>

                            </a>
                        </li>
                        <li class="<?php if(Request::is('pno/question_forum/add') || Request::is('pno/question_forum/edit/'.$qf) || Request::is('pno/question_forum/'.$qf)): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route('pno.question_forum')); ?>">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                <?php echo e("Question Forum"); ?>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /sidebar menu -->
        </div>
    </div>
    