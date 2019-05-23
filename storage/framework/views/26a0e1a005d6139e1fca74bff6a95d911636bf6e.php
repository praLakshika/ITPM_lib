<?php $__env->startSection('content'); ?>
    <div class="row">
            <div class="col-12 col-md-8">
                    <?php $__env->startSection('title', "Patient Management"); ?>
                    </div>
            <div class="col-8 col-md-4" style="padding-bottom: 15px;">
                    <div class="topicbar">
                        <a href="<?php echo e(route('admin.diagnosis.index')); ?>" class="btn btn-primary"> diagnosis card</a>
                    </div>
                    <div class="right-searchbar">
                        <!-- Search form -->
                        <form class="form-inline active-cyan-3">
                            <input class="form-control form-control-sm ml-3 w-100" type="text" placeholder="Search" aria-label="Search">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </form>
                    </div>
                </div>
        
                
            </tr>
            </thead>
            <tbody>
            
                <tr>
                        
                    
                    
                            
                                    
                                
                            
                        
                    </td>
                </tr> 
            
            </tbody>
        </table> 
        
        <div class="pull-right">
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('employee.pno.layouts.pno', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>