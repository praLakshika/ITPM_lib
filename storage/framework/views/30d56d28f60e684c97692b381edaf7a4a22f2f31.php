<?php $__env->startSection('title', "Services Management"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            

            <tr>
                <th>Patient Name</th>
                <td><?php echo e($Quotation->pronounced); ?>.<?php echo e($Quotation->name); ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo e($Quotation->address); ?></td>
            </tr>
            <tr>
                <th>Date</th>
                <td><?php echo e($Quotation->date); ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo e($Quotation->address); ?></td>
            </tr>
            <tr>
                <th>Divice</th>
                <td><?php echo e($Quotation->divice); ?></td>
            </tr>
            <tr>
                <th>Diagnosis</th>
                <td><?php echo e($Quotation->diagnosis); ?></td>
            </tr>
            <tr>
                <th>Prescription</th>
                <td><?php echo e($Quotation->prescription); ?></td>
            </tr>
            <tr>
                <th>Warranty</th>
                <td><?php echo e($Quotation->warranty); ?></td>
            </tr>
            <tr>
                <th>Delivery date</th>
                <td><?php echo e($Quotation->deliverydate); ?></td>
            </tr>
            
            <tr>
                <th>Price</th>
                <td><?php echo e($Quotation->price); ?></td>
            </tr>
            <tr>
                <th>Price validity</th>
                <td><?php echo e($Quotation->pricevalidity); ?></td>
            </tr>
            <tr>
                <th>Payment method</th>
                <td><?php echo e($Quotation->paymentmethod); ?></td>
            </tr>
            <tr>
                <th>Print</th>
                <td> 
                    <form action="printQuotation" method="post">
                            <?php echo e(csrf_field()); ?>

                        <input type="hidden" id="id" name="id" value="<?php echo e($Quotation->id); ?>">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
        <a href="<?php echo e(route('admin.quotation')); ?>" class="btn btn-danger">Quotation home</a>
        <a class="btn btn-info" href="<?php echo e(route('admin.quotation.edit',[$Quotation->id])); ?>">Edit</a>
    </div>
    <script>
            // Get the modal
            var modal = document.getElementById('myModal');
            // var img=document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
           
              function displayIMG(clicked_id)
            {
                modal.style.display = "block";
                modalImg.src = document.getElementById(clicked_id).src;
                captionText.innerHTML =document.getElementById(clicked_id).alt;
            }  
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
                modal.style.display = "none";
            }
            </script>
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>