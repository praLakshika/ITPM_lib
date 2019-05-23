<?php $__env->startSection('navigation'); ?>
<nav class="navbar navbar-inverse">
                
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand active" href="<?php echo e(url('/')); ?>">Artificiallimbcare.lk</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="<?php echo e(url('/')); ?>"><?php echo e(__('views.welcome.home')); ?></a></li>
      <li ><a href="<?php echo e(url('/aboutus')); ?>">About Us</a></li>
      <li > <a href="<?php echo e(url('/services')); ?>">Services</a></li>
      <li >  <a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
      
     
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
          <?php if(Route::has('login')): ?>
          <?php if(!Auth::check()): ?>
              <?php if(config('auth.users.registration')): ?>
                  
              <?php endif; ?>
              <li class="active"><a href="<?php echo e(url('/login')); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
   
        

                        

                        
                    
        <div  role="alert">
               
                <div class="panel-body">
                        <div class="container">
                            <div class="row ">
                                    <div class="col-xs-12 col-sm-12 col-lg-4  ">
                                            <div class="panel panel-warning">
                                                    <div class="panel-heading ">
                                <p style="text-align:center;"><img src="img/icons/library.png" class="center" width="350" height="350"></p></div>
                                            </div></div>  
                                <div class="col-xs-12 col-sm-12 col-lg-8">
                                        <div class="panel panel-primary">
                                                <div class="panel-heading ">
                                <h2>Login form</h2>
                                <?php echo e(Form::open(['route' => 'login'])); ?>

                                  <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                                    placeholder="<?php echo e(__('views.auth.login.input_0')); ?>" required autofocus>
                                </div>
                                  <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input id="password" type="password" class="form-control" name="password"
                                    placeholder="<?php echo e(__('views.auth.login.input_1')); ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" onclick="myFunction()">Show Password
                                </div>
                                  <div class="checkbox">
                                    <label>
                                            <input type="checkbox"
                                            name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('views.auth.login.input_2')); ?>

                                    </label>

                                  </div>
                                  <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>

                        <?php endif; ?>

                        <?php if(!$errors->isEmpty()): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $errors->first(); ?>

                            </div>
                        <?php endif; ?>
                        <button class="btn btn-default submit" type="submit"><?php echo e(__('views.auth.login.action_0')); ?></button>
                        <a style="background-color: yellow; "class="reset_pass" href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('views.auth.login.action_1')); ?>

                        </a>
                        <?php echo e(Form::close()); ?>

                              </div></div>
                                    </div>
                            </div></div>
                            <br>
                <br><br><br><br>
                <br>
    <br><br><br><br><br><br>
                            <div class="panel panel-danger">
                        
                                    
                                    <div class="panel-heading"> <div class="col-12 col-lg-5">|| Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  by ALC(pvt) Ltd.<br></div>
                                    <div  align="right"> Web Design by<a href="https://www.facebook.com/team176sri/" target="_blank">Team 176</a></div>
                                </div>
                                </div>
                                    
                                    
                       
<script>
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>                     
                                
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##

    <?php echo e(Html::style(mix('assets/auth/css/login.css'))); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>