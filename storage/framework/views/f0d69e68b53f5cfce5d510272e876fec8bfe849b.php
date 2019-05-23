<?php $__env->startSection('navigation'); ?>
<nav class="navbar navbar-inverse">
                
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand active" href="<?php echo e(url('/')); ?>">Artificiallimbcare.lk</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="<?php echo e(url('/')); ?>"><?php echo e(__('views.welcome.home')); ?></a></li>
      <li  ><a href="<?php echo e(url('/aboutus')); ?>">About Us</a></li>
      <li > <a href="<?php echo e(url('/services')); ?>">Services</a></li>
      <li class="active">  <a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
      
     
      
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
                    <h2 class="breadcumb-title">Contact</h2>
                </div>
            </div>
            
        <div class="container">
            <div  align="center"  class=" col-xs-12 col-sm-12  col-lg-12" style="width:100%;height:400px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126727.089288154!2d79.8617497071549!3d6.983162333845486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae257486ae32765%3A0x5f571d56e0a767bc!2sArtificial+limb+care+(Pvt)+Ltd.!5e0!3m2!1sen!2slk!4v1531708933391"   style="height:350px;width:350px" frameborder="1" style="border:1" allowfullscreen></iframe>
            </div>
        </div>
                
                <div class="container">
                        <div class="col-xs-12 col-sm-12  col-lg-4">
                            <div class="panel panel-info ">
                                <div class="panel-heading " >
                                    <h4>Friday close...</h4>
                              <h4>Other days 9am - 5am</h4>
                                </div>
                          </div>
                         </div> 
                         <div class="col-xs-12 col-sm-12  col-lg-4">
                            <div class="panel panel-info ">
                                <div class="panel-heading " >
                                    <h4>Email:-info@artificiallimbcare.lk</h4>
                                    <h4> Call Us:-<a href="tel:0713450257">071 345 0257</a> </h4>
                              
                                </div>
                          </div>
                         </div> 
                         <div class="col-xs-12 col-sm-12 col-lg-4">
                            <div class="panel panel-info ">
                                <div class="panel-heading " >
                                    <h4>No 4, Mithrananda Mawatha,</h4> 
                                    <h4>Kiribathgoda.<br></h4>
                                </div>
                          </div>
                         </div> 
                        </div>.
      <div class="container">
            <div class="panel panel-danger">

                
                <div class="panel-heading"> <div class="col-12 col-lg-5">|| Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  by ALC(pvt) Ltd.<br></div>
                <div  align="right"> Web Design by<a href="https://www.facebook.com/team176sri/" target="_blank">Team 176</a></div>
            </div>
          </div></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>