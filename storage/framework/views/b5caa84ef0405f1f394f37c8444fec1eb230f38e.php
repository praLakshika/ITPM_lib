<?php $__env->startSection('content'); ?>
    <div class="row title-section">
        <div class="col-12 col-md-8">
        <?php $__env->startSection('title', "Quotation Management"); ?>
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            <div class="topicbar">
                <a href="<?php echo e(route('admin.quotation.add')); ?>" class="btn btn-primary">Add Quotation</a>
            </div>
            <div class="right-searchbar">
                    <!-- Search form -->
                    <form action="searchQuotation" method="post" class="form-inline">
                            <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search" required />
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                        </div>
                        
                    </form>
                </div>
           
        </div>
    </div>
    <div class="row">
        <?php if($quotations->isEmpty()): ?>
        <div class="alert alert-danger" role="alert">
                <p>Not have Data in service table</p>
        </div>
        <?php else: ?>
        <div class="container">
                <br>
               
        
        <div class="row">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                    width="100%">
                <thead> 
                <tr>
                    <th>DID</th>
                    <th>Patient name</th>
                    <th>Service</th>
                    <th>Doctor name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $quotations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quotation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr> 
                        <td><?php echo e($quotation->did); ?></td>
                        <td><?php echo e($quotation->name); ?></td>
                        <td><?php echo e($quotation->divice); ?></td>
                        <td><?php echo e($quotation->diagnosis); ?></td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.quotation.show',[$quotation->id])); ?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.quotation.edit',[$quotation->id])); ?>">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-xs btn-danger" href="<?php echo e(route('admin.quotation.delete',[$quotation->id])); ?>">
                                <i class="fa fa-trash"></i>
                            </a>
                            
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
    <div class="pull-right">
    </div>
</div>
</div>
        <?php endif; ?>
    
    </div>
    <div id="myModal" class="modal">
            <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
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