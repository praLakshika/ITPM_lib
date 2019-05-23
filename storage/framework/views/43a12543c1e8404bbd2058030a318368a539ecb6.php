<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style type="text/css">
        .box{
            width:800px;
            margin:0 auto;
        }
    </style>
    <script type="text/javascript">
        var analytics = <?php echo $gender; ?>

        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);

        function drawChart()
        {
            var data = google.visualization.arrayToDataTable(analytics);
            var options = {
                title : 'Percentage of Male and Female Patients'
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            chart.draw(data, options);
        }
    </script>
</head>
<?php $__env->startSection('title',"Patient Report Generate ", "Patient"); ?>
<body>
<?php $__env->startSection('content'); ?>
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <h1>Period Report Genarate</h1>
        <form action="patientsreport" method="post">

            <?php echo e(csrf_field()); ?>


            <div class="form-row">


            <div class="col">
                <label for="inputAddress">Starting From</label>
                <input type="date" name="from_date" class="form-control" id="inputAddress" value="">
            </div>
            <div class="col">
                <label for="inputAddress">End Date</label>
                <input type="date" name="to_date" class="form-control" id="inputAddress" value="">
            </div>
            <div class="col">
            <button type="submit" class="btn btn-primary">Genarate</button>
            </div>
            </div>

        </form>
<h1>Overal presentage of Patient by Pie-chart</h1>
        <br />
        <div class="container">


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Percentage of Male and Female Patient</h3>
                </div>
                <div class="panel-body" align="center">
                    <div id="pie_chart" style="width:750px; height:450px;">

                    </div>
                </div>
            </div>


        </div>
    </div>
</body>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/users/edit.css'))); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <?php echo e(Html::script(mix('assets/admin/js/users/edit.js'))); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>