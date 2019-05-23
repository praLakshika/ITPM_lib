<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
            <title>ARD book renting</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        
        <?php print app('meta')->render(); ?>

        
        <?php echo e(Html::style(mix('assets/app/css/app.css'))); ?>


        
        <?php echo $__env->yieldContent('styles'); ?>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="<?php echo e(asset('admin/css/userstyles.css')); ?>" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
        
        <?php echo $__env->yieldContent('head'); ?>

    </head>
    <style>
       
            .imgdis {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        body {font-family: Arial, Helvetica, sans-serif;}
        .imgdis:hover {opacity: 0.7;}
        
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }
        
        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }
        
        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }
        
        /* Add Animation */
        .modal-content, #caption {    
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }
        
        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)} 
            to {-webkit-transform:scale(1)}
        }
        
        @keyframes  zoom {
            from {transform:scale(0)} 
            to {transform:scale(1)}
        }
        
        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }
        
        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
        
        /* 100% Image Width on Smaller Screens */
        @media  only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }
        </style>
        
    <body class="<?php echo $__env->yieldContent('body_class'); ?>">

        
        <?php echo $__env->yieldContent('page'); ?>

        
        <?php echo e(Html::script(mix('assets/app/js/app.js'))); ?>


        
        <script> window.Laravel = {"locale":"en"}</script>

        
        <?php echo $__env->yieldContent('scripts'); ?>
        
    </body>
</html>
