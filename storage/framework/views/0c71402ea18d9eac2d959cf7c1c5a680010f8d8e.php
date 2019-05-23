<?php $__env->startSection('navigation'); ?>
<nav class="navbar navbar-inverse">
                
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand active" href="<?php echo e(url('/')); ?>">ARD book renting</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="<?php echo e(url('/')); ?>"><?php echo e(__('views.welcome.home')); ?></a></li>
      <li class="active"><a href="<?php echo e(url('/aboutus')); ?>">About Us</a></li>
      <li > <a href="<?php echo e(url('/services')); ?>">Services</a></li>
      <li >  <a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
      
     
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
            <?php if(Route::has('login')): ?>
            <?php if(!Auth::check()): ?>
                <?php if(config('auth.users.registration')): ?>
                    
                <?php endif; ?>
                <li><a href="<?php echo e(url('/login')); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php else: ?>
                <?php if(auth()->user()->usertype == 'administrator'): ?>
                <li> <a href="<?php echo e(url('/admin')); ?>"><?php echo e(__('views.welcome.admin')); ?></a></li>
                <?php elseif(auth()->user()->usertype == 'Receptionist'): ?>
                <li> <a href="<?php echo e(url('/receptionist')); ?>"><?php echo e(__('views.welcome.admin')); ?></a></li>
                <?php elseif(auth()->user()->usertype == 'PNO'): ?>
                <li>  <a href="<?php echo e(url('/pno')); ?>"><?php echo e(__('views.welcome.admin')); ?></a></li>
                <?php elseif(auth()->user()->usertype == 'Director'): ?>
                <li>  <a href="<?php echo e(url('/director')); ?>"><?php echo e(__('views.welcome.admin')); ?></a></li>
                <?php elseif(auth()->user()->usertype == 'Patient'): ?>
                <li>  <a href="<?php echo e(url('/patient')); ?>"><?php echo e(__('views.welcome.admin')); ?></a></li>
                <?php elseif(auth()->user()->usertype == 'Doctor'): ?>
                <li>  <a href="<?php echo e(url('/doctor')); ?>"><?php echo e(__('views.welcome.admin')); ?></a></li>
                <?php endif; ?>
                <li><a href="<?php echo e(url('/logout')); ?>"><span class="glyphicon glyphicon-log-out"></span><?php echo e(__('views.welcome.logout')); ?></a></li>
            <?php endif; ?>
        <?php endif; ?>
        
      </ul>
  </div>
</nav>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

        
        <div class="container">
                        <div class="well" style="background-image: url(img/bg-img/rsz_1hero2.jpg);">
                                <!-- Title -->
                                <h2 >About Us</h2>
                            </div>
                        
                            <div class="col-xs-12 col-sm-12  col-lg-4">
                                    <div class="panel panel-info ">
                                        <div class="panel-heading " >
                                                <h1 align="center">Our vision</h1>
                                                <h3 align="center">
                                                        The ARD Book renting library provides quality resources and innovative services to stimulate creativity, intellectual curiosity, and to facilitate lifelong learning and research within the communities we serve.
                                                        <br><br><br></h3>
                                       
                                        </div>
                                  </div>
                                 </div> 
                                 <div class="col-xs-12 col-sm-12  col-lg-4">
                                        <div class="panel panel-info ">
                                            <div class="panel-heading " >
                                                    <h1 align="center">Mission</h1>
                                                    <h3 align="center">
                                                            We bring people and information together.
                                                            <br><br><br><br><br><br><br><br><br><br></h3>
                                                
                                            </div>
                                      </div>
                                     </div> 
                                     <div class="col-xs-12 col-sm-12  col-lg-4">
                                            <div class="panel panel-info ">
                                                <div class="panel-heading " >
                                                        <h1 align="center">Service </h1>
                                                        <h3 align="center">
                                                                The libraries are actively integrated into the undergraduate curriculum by means of significant partnerships which recognize the centrality of information resources to the learning experience.
                                                                <br><br><br><br></h3>
                                                    
                                                </div>
                                          </div>
                                         </div> 
              </div>
              <div class="container">
                   <br>
                   <br>
                    <div class="well well-lg"> 
                        
                            <div class="panel panel-success">
                                    <div class="panel-heading"><h2>Welcome to ARD Book renting</h2></div>
                                    <div class="panel-body">       
                        <p align="justify">
                           With information of ARD Book renting library management system, we can appeal to a new generation of library members through the solution's collobarative user interface, sophisticated search functionality
                           and personalized online environment.
                     
                        <br>
                        <br>
                           
                        <br>
                        <div class="col-xs-7">
                                <h2>Our main services</h2>
                                <ul>
                                    <li>Book renting </li>
                                    <li>Provide online books</li>
                                </ul>
                        <br>
                            from,
                            <br>
                            Librarian
                        
                       
                        <img src="img/bg-img/signature.png" alt=""></div>
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                                <div class="medica-about-thumbnail">
                                    <img src="img/icons/library.png" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                                  </div>
                  </div>
                  <div class="container">
                        <div class="panel panel-danger">
    
                            
                            <div class="panel-heading"> <div class="col-12 col-lg-5">|| Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  by ARD book renting.<br></div>
                            <div  align="right"> Web Design by<a href="https://www.facebook.com/team176sri/" target="_blank">Team 176</a></div>
                        </div>
                      </div></div>
                  
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>