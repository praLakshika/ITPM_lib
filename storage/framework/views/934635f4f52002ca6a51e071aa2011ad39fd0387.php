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
                        
                        <img src="\img\core-img\administrator-male.png" alt="">Librarian
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li>
                                    <a href="<?php echo e(route('logout')); ?>">
                                        <i class="fas fa-sign-out-alt"></i>Log out
                                    </a>
                                </li>
                       
                        <li>
                                <a href="<?php echo e(route('/')); ?>">
                                    <i class="fa fa-home pull-right"></i> Home
                                </a>
                            </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>