<?php $this->load->view('adminpanel/header.php'); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 cc_cursor"><br>
    <h2>Add Blog</h2><br>
    <form enctype="multipart/form-data" action="<?= base_url().'admin/blog/addblog_post' ?>" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="blog_title" placeholder="title">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="blog_desc" placeholder="Blog Desc"></textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="file" placeholder="File">
        </div>

        <button type="submit" class="btn btn-primary">Add Blog</button>
    </form>
</main>
</div>
</div>
<?php $this->load->view('adminpanel/footer.php'); ?>

<script type="text/javascript">
    <?php
    if(isset($_SESSION['inserted'])){
         if ($_SESSION['inserted'] == "yes") {
            echo "alert('Data Insert Successfully !')";
        }else{
            echo "alert('Not Inserted.Please try again !')";
        }
    }
    ?>
</script>

