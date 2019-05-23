<?php $__env->startSection('content'); ?>
    <div class="row">
            <div class="col-12 col-md-8">
                    <?php $__env->startSection('title', "Patient Management"); ?>
                    </div>
            <div class="col-8 col-md-4" style="padding-bottom: 15px;">
                    <div class="topicbar">
                        <a href="<?php echo e(route('patient.diagnosis.index')); ?>" class="btn btn-primary"> diagnosis card</a>
                    </div>
                    <div class="right-searchbar">
                        <!-- Search form -->
                        
                    </div>
                </div>
                <?php
    
                use Illuminate\Support\Facades\DB;
                $email=auth()->user()->email;
                
                $IDs = DB::table('patient')->where('email', $email)->get();
                $IDpa = 0;
                        foreach($IDs as $ID)
                        {
                            $IDpa=$ID->id;
                            
                        }
                        $pation = DB::select('select * from patient where id ='.$IDpa);
                        $name='n';
                            $Gender='n';
                            $mobile='n';
                            $address='n';
                            $pat_pic='n';
                foreach($pation as $pations)
                        {
                            $name=$pations->name;
                            $Gender=$pations->Gender;
                            $mobile=$pations->mobile;
                            $address=$pations->address;
                            $pat_pic=$pations->pat_pic;
                        }
                
                ?>
               
                    <div class="row">
                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr> 
                                <th><?php echo e(__('views.admin.users.show.table_header_0')); ?></th>
                                <td><img height="200" width="200" src="\image\pat\profile\<?php echo e($pat_pic); ?>" class="user-profile-image"></td>
                            </tr>
                
                            <tr>
                                <th>Patient name</th>
                                <td><?php echo e($name); ?></td>
                            </tr>
                
                            <tr>
                                <th>Patient Gender</th>
                                <td>
                                        <?php echo e($Gender); ?>

                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>mobile</th>
                                <td>
                                    <?php echo e($mobile); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>address</th>
                                <td>
                                        <?php echo e(($address)); ?>

                                        
                                </td>
                            </tr>
                
                            </tbody>
                        </table>
                     </div>
                <?php $__env->stopSection(); ?>
<?php echo $__env->make('patient.layouts.patient', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>