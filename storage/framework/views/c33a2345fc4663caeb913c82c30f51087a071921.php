<?php $__env->startSection('navigation'); ?>
<nav class="navbar navbar-inverse">
                
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand active" href="<?php echo e(url('/')); ?>">ARD book renting</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('views.welcome.home')); ?></a></li>
      <li ><a href="<?php echo e(url('/aboutus')); ?>">About Us</a></li>
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
              <li>  <a href="<?php echo e(url('/member')); ?>"><?php echo e(__('views.welcome.admin')); ?></a></li>
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
  <div class="row">
      <div class="col-xs-12" >
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
  
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="http://clipgoo.com/daut/as/f/a/appealing-home-library-design-with-brown-wooden-wall-bookshelf-fancy-building-a-leather-comfy-armchair-near-and_curved-bookshelf_home-decor_home-decorators-coupon-code-decor-liquidators-tuscan-christm.jpg" alt="Los Angeles" width="1800px" height="800px">
        </div>
  
        <div class="item">
          <img src="https://d24fkeqntp1r7r.cloudfront.net/wp-content/uploads/2018/11/27195319/library-869061_1920.jpg" alt="Chicago" width="1800px" height="800px">
        </div>
      
        <div class="item">
          <img src="https://farm7.staticflickr.com/6204/6096943662_251c7be78c_o.jpg" alt="New york" width="1800px" height="800px">
        </div>
      </div>
  
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div></div>
        </div>
<br>
.
<div class="container">
    <div class="col-xs-12 col-sm-12  col-lg-4">
        <div class="panel panel-info ">
            <div class="panel-heading " >
                
          <h4>All days 9am - 5am</h4>
          
          <h4>Poya day holiday</h4>
            </div>
      </div>
     </div> 
     <div class="col-xs-12 col-sm-12  col-lg-4">
        <div class="panel panel-info ">
            <div class="panel-heading " >
                <h4>Email:-info@ardbookrenting.lk</h4>
                <h4> Call Us:-<a href="tel:0713450257">071 345 0257</a> </h4>
          
            </div>
      </div>
     </div> 
     <div class="col-xs-12 col-sm-12 col-lg-4">
        <div class="panel panel-info ">
            <div class="panel-heading " >
                <h4>SLIIT</h4> 
                <h4>Malabe.<br></h4>
            </div>
      </div>
     </div> 
    </div>
   <br>

      <div class="container">
          <br>
          <div class="well well-lg"><p style="text-align:center;">
            <img src="img/icons/library.png" alt="" width="75px" height="75px"></p>
            <h2 align="center">Our Services</h2>
                 
            </div>
            <div class="col-xs-6 col-sm-6 col-lg-3">
              </div>
            <div class="col-xs-6 col-sm-6 col-lg-3">
              <div class="panel panel-success ">
                  <div class="panel-heading " >
                      <p style="text-align:center;"><i class="fa fa-wheelchair fa-3x"  aria-hidden="true"> </i></p>
                       <h5 align="center">Book renting</h5>
                  </div>
            </div>
           </div>  
          
           <div class="col-xs-6 col-sm-6 col-lg-3">
              
              <div class="panel panel-success ">
                  <div class="panel-heading " > 
                      <p style="text-align:center;"> <i class="fa fa-child fa-3x"  aria-hidden="true"> </i></p>
                   <h5 align="center">Online library</h5></div>
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