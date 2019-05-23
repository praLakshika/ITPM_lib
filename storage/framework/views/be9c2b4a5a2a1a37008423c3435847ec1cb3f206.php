<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo e(route('receptionist.dashboard')); ?>" class="site_title">
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
                        
                        <a href="<?php echo e(route('receptionist.dashboard')); ?>">
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
                    <?php ($emp = $employee[0]->id); ?>
                <?php endif; ?>
                <?php if(!empty($appointment)): ?>
                    <?php ($app = $appointment->id); ?>
                <?php endif; ?>
                <?php if(!empty($stores)): ?>
                    <?php ($stor = $stores->id); ?>
                <?php endif; ?>
                

                <ul class="nav side-menu">
                    <li class="<?php if(Request::is('receptionist/employees') || Request::is('receptionist/employees/add')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('receptionist.employees')); ?>">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <?php echo e("Employees"); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('receptionist/patients') || Request::is('receptionist/patients/add')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('receptionist.patients')); ?>">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <?php echo e("Patients"); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('receptionist.doctors')); ?>">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <?php echo e("Doctors"); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('receptionist/appointments/add') || Request::is('receptionist/appointments/'.$app.'/edit') || Request::is('receptionist/appointments/'.$app)): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('receptionist.appointments')); ?>">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <?php echo e("Appointments"); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('receptionist.services')); ?>">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <?php echo e("Services"); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('receptionist/store/add') || Request::is('receptionist/store/edit/'.$stor) || Request::is('receptionist/store/'.$stor)): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('receptionist.store')); ?>">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                            <?php echo e("Store"); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('receptionist/question_forum/add') || Request::is('receptionist/question_forum/edit/'.$qf) || Request::is('receptionist/question_forum/'.$qf)): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('receptionist.question_forum')); ?>">
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
