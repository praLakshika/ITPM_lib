<?php $__env->startSection('title', "Book Management"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                    <?php
    
                    use Illuminate\Support\Facades\DB;
                    $email=auth()->user()->email;
                    $IDs = DB::table('book_author')->where('id', $books->authorid)->get();
                    $author_name = "pandding";
                        foreach($IDs as $ID)
                        {
                            $author_name=$ID->name;
                            
                        }
                    ?>
                <th>Book Image</th>
                <td>
                        <img  id="myImg" onclick="displayIMG(this.id)" height="200" width="200" src="\image\book\pic\<?php echo e($books->book_pic); ?>" alt=<?php echo e($books->name); ?>>
                        <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                          </div>
                        
            </tr>

            <tr>
                <th>Book name</th>
                <td><?php echo e($books->bookname); ?></td>
            </tr>

            <tr>
                    <th>Book author name</th>
                    <td><?php echo e($author_name); ?></td>
                </tr>
            <tr>
                    <th>Book quantity</th>
                    <td><?php echo e($books->book_quantity_full); ?></td>
                </tr>
            <tr>
                <th>Available Book quantity</th>
                <td>
                        <?php echo e($books->book_quantity_now); ?>

                    </a>
                </td>
            </tr>
            <tr>
                <th>Services description</th>
                <td>
                    <?php echo e(($books->book_published_year)); ?> 
                </td>
            </tr>
            </tbody>
        </table>
        <a href="<?php echo e(route('admin.book')); ?>" class="btn btn-danger">Book home</a>
        <a class="btn btn-info" href="<?php echo e(route('admin.book.edit',[$books->id])); ?>">Edit</a>
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