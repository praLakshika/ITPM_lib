<?php $__env->startSection('navigation'); ?>
<nav class="navbar navbar-inverse">
                
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand active" href="<?php echo e(url('/')); ?>">Artificiallimbcare.lk</a>
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
                                                <h3 align="center">Our vision is to undertake new technology, development of skills, seeking of new principles, innovation and understanding of the patient’s needs in Prosthetics & Orthotics that can serve the human kind with passion. <br><br><br></h3>
                                       
                                        </div>
                                  </div>
                                 </div> 
                                 <div class="col-xs-12 col-sm-12  col-lg-4">
                                        <div class="panel panel-info ">
                                            <div class="panel-heading " >
                                                    <h1 align="center">Mission</h1>
                                                    <h3 align="center">To provide the highest quality prosthetics & Orthotics care and rehabilitation services to ensure that each patient achieves the maximum functional recovery from disability. <br><br><br><br></h3>
                                                
                                            </div>
                                      </div>
                                     </div> 
                                     <div class="col-xs-12 col-sm-12  col-lg-4">
                                            <div class="panel panel-info ">
                                                <div class="panel-heading " >
                                                        <h1 align="center">Service </h1>
                                                        <h3 align="center">ALC aims to provide clients with a private, confidential and safe environment, where they have the opportunity to choice new technology to change the life and in their environment to enable them to maintain moderation and progress in their recovery.<br><br></h3>
                                                    
                                                </div>
                                          </div>
                                         </div> 
              </div>
              <div class="container">
                   <br>
                   <br>
                    <div class="well well-lg"> 
                        
                            <div class="panel panel-success">
                                    <div class="panel-heading"><h2>Welcome to Artificial limb care (Pvt) Ltd</h2></div>
                                    <div class="panel-body">       
                        <p align="justify">
                            Welcome to Artificial limb care in sri lanka and Thank you for visiting <mark style="color: rgba(248, 0, 0, 0.897);">artificiallimbcare.lk</mark>, an Artificial limb
                            care (Pvt) Ltd. At ALC, we are dedicated to helping you experience a lifetime of good health. We are glad
                            that you have chosen to learn more about us and how we would meet the prosthetics & Orthotics
                            care and rehabilitation services of you or your loved one. 
                        <br>
                    <br>
                            Our mission is to provide the highest quality prosthetics & Orthotics care and rehabilitation
                            services to ensure that each patient achieves the maximum functional recovery from disability.
                            When asked what distinguishes ALC from other Community Health Centers, our response is
                            simple. It is compassion of our highly skilled and devoted caregivers that truly defines us. Their
                            commitment to advancing frontier healthcare and their approach to care has earned the trust of
                            clients.
                        <br>
                        <br>
                            On behalf of the ALC’s entire staff of health care professionals and support staff, I extend a warm welcome.
                        <br>
                        <div class="col-xs-7">
                                <h2>Our main services</h2>
                                <ul>
                                    <li>upper limb orthosis</li>
                                    <li>lower limb prosthisis</li>
                                    <li>upper limb prosthesis</li>
                                    <li>silicon prosthesis</li>
                                </ul>
                        <br>
                            from,
                            <br>
                            Chief Executive Officer
                        
                       
                        <img src="img/bg-img/signature.png" alt=""></div>
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                                <div class="medica-about-thumbnail">
                                    <img src="img/bg-img/about1.png" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                                  </div>
                  </div>
                  <div class="container">
                        <div class="panel panel-danger">
    
                            
                            <div class="panel-heading"> <div class="col-12 col-lg-5">|| Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  by ALC(pvt) Ltd.<br></div>
                            <div  align="right"> Web Design by<a href="https://www.facebook.com/team176sri/" target="_blank">Team 176</a></div>
                        </div>
                      </div></div>
                  
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>