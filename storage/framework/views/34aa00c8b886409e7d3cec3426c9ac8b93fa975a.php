<?php $__env->startSection('title', "Book Management"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <?php
    
                use Illuminate\Support\Facades\DB;
                $email=auth()->user()->email;
                $members = DB::table('member')->where('email', $email)->get();
                $mbr_pic = "pandding";
                $address = "pandding";
                $birthday = "pandding";
                $contact = "pandding";
                $email = "pandding";
                $nic = "pandding";
                $name = "pandding";
                $id = "pandding";
                
                    foreach($members as $member)
                    {
                        $mbr_pic=$member->mbr_pic;
                        $address=$member->address;
                        $birthday=$member->birthday;
                        $contact=$member->contact;
                        $email=$member->email;
                        $nic=$member->nic;
                        $name=$member->name;
                        $id=$member->id;
                        $name=$member->name;
                    }
                ?>
                <th>Member Image</th>
                <td>
                        <img  id="myImg" onclick="displayIMG(this.id)" height="200" width="200" src="\image\member\pic\<?php echo e($mbr_pic); ?>" alt=<?php echo e($name); ?>>
                        <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                          </div>
                        
            </tr>

            <tr>
                <th>Member name</th>
                <td><?php echo e($name); ?></td>
            </tr>

            <tr>
                    <th>Member nic</th>
                    <td><?php echo e($nic); ?></td>
                </tr>
            <tr>
                    <th>Member email</th>
                    <td><?php echo e($email); ?></td>
                </tr>
            <tr>
                <th>Member contact</th>
                <td>
                        <?php echo e($contact); ?>

                    </a>
                </td>
            </tr>
            <tr>
                <th>Member birthday</th>
                <td>
                    <?php echo e(($birthday)); ?> 
                </td>
            </tr>
            <tr>
                <th>Member address</th>
                <td>
                    <?php echo e(($address)); ?> 
                </td>
            </tr>
            </tbody>
        </table>
        <a class="btn btn-info" href="<?php echo e(route('patient.member.edit',[$id])); ?>">Edit my details</a>
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
<?php echo $__env->make('member.layouts.member', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>