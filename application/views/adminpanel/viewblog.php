<?php $this->load->view('adminpanel/header.php'); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 cc_cursor"><br>
    <h2>View Blogs</h2><br>
    <?php
                // echo "<pre>";
                //     print_r($result); die(); 
    ?>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Title</th>
                    <th>Desc</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($result){
                    $counter = 1;
                    foreach ($result as $key => $value) {
                        echo "<tr>
                    <td>".$counter ."</td>
                    <td>".$value['blog_title']."</td>
                    <td>".$value['blog_desc']."</td>
                    <td><img src='".base_url().$value['blog_img']."' class='img-responsive' width='100' height='80'></td>

                    <td><a class=\"btn btn-info\" href='". base_url().'admin/blog/editblog/'.$value['blogid']."'>edit</a></td>

                    <td><a class=\"btn delete btn-danger\" href='#.' data-id='".$value['blogid']."'>delete</a></td>
                </tr>";
                    $counter++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
</div>
</div>
<?php $this->load->view('adminpanel/footer.php'); ?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script>
    $(".delete").click(function(){
        var delete_id = $(this).attr('data-id');
        // alert($(this).attr('data-id'));
        var bool = confirm('Are u sure you want to delete this blog permanently.');
        // console.log(bool);
        if(bool){
            // alert('Move to delete functionality using AJAX');
            // jquery ajax google cdn
            $.ajax({
                url:'<?= base_url().'admin/blog/deleteblog/' ?>',
                type:'post',
                data:{'delete_id':delete_id},
                success:function(response){
                    console.log(response);
                    if(response == "deleted"){
                        location.reload();
                    }else if(response == "notdeleted"){
                        alert('Something went wrong ! Please Try again');
                    }
                }
            });
        }else{
            alert('Your Blog is safe');
        }
    });
    
    <?php
        if(isset($_SESSION['updated'])){
            if ($_SESSION['updated'] == "yes") {
                echo "alert('Update Data Successfully !')";
            }else if ($_SESSION['updated'] == "no") {
                echo "alert('Some error occurred & data not updated !')";
            }
        }
    ?>
</script>