<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        
                        <img src="http://203.157.229.35/sis/img/user_icon.png" alt="">
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                            <a href="<?php echo e(route('logout')); ?>">
                                <i class="fa fa-sign-out pull-right"></i> <?php echo e(__('views.backend.section.header.menu_0')); ?>

                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>