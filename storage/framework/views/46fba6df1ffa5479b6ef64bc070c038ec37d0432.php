<?php $__env->startSection('title', "Online Book Management"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
                    <?php
                    use Illuminate\Support\Facades\DB;
                    use Carbon\Carbon;
                    $booksadd = DB::select('select * from book where id ='.$Book_issue->book_id);
                    $members = DB::select('select * from member where id ='.$Book_issue->member_id);
                    $bookname="panding";
                    $mytime = Carbon::now();
                    foreach($booksadd as $bookadd)
                    {
                        $bookname=$bookadd->bookname;
                    }
                    $membername="panding";
                    foreach($members as $member)
                    {
                        $membername=$member->name;
                    }
                    ?>

<tr>
        <th>Book name</th>
        <td><?php echo e($bookname); ?></td>
    </tr>

    <tr>
        <th>Member Name</th>
        <td>
             <?php echo e($membername); ?>

        </td>
    </tr>

    <tr>
        <th>Book get date</th>
        <td>
            <?php echo e($Book_issue->getdate); ?>

        </td>
    </tr>
    <tr>
        <th>Book issued date</th>
        <td>
            <?php echo e($Book_issue->book_issued_day); ?>

        </td>
    </tr>
    <tr>
            <th>Book returned date</th>
            <td>
                <?php echo e($Book_issue->book_returned_day); ?>

            </td>
        </tr>

                  
            </tbody>
        </table>
        <a href="<?php echo e(route('patient.book_issue')); ?>" class="btn btn-danger">Book issue home</a>
        
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