<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo e(route('patient.dashboard')); ?>" class="site_title">
                <span>Artificial limb care </span>
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
                        
                        <a href="<?php echo e(route('patient.dashboard')); ?>">
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
                    <?php ($emp = $employee->id); ?>
                <?php endif; ?>
                <?php if(!empty($appointment)): ?>
                    <?php ($app = $appointment->id); ?>
                <?php endif; ?>
                <?php if(!empty($stores)): ?>
                    <?php ($stor = $stores->id); ?>
                <?php endif; ?>
                

                <ul class="nav side-menu">
                    <li class="<?php if(Request::is('patient/diagnosis') || Request::is('patient/diagnosis/add')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('patient.patients')); ?>">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <?php echo e("Patients"); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('patient.doctors')); ?>">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <?php echo e("Doctors"); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('patient/appointments/add') || Request::is('patient/appointments/'.$app.'/edit') || Request::is('receptionist/appointments/'.$app)): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('patient.appointments')); ?>">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <?php echo e("Appointments"); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('patient.services')); ?>">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <?php echo e("Services"); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('patient/question_forum/add') || Request::is('patient/question_forum/edit/'.$qf) || Request::is('patient/question_forum/'.$qf)): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('patient.question_forum')); ?>">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                            <?php echo e("Question Forum"); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('patient/financial')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('patient.financial')); ?>">
                            <i class="fa fa-money" aria-hidden="true"></i>
                            <?php echo e("Financial"); ?>

                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
