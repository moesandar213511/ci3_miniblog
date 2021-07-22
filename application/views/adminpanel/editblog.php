<?php $this->load->view('adminpanel/header.php'); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 cc_cursor"><br>
    <h2>Edit Blog</h2><br>
    <?php 
        // echo "<pre>";
        // print_r($result); die(); 
    ?>
    <form enctype="multipart/form-data" action="<?= base_url() . 'admin/blog/editblog_post' ?>" method="post">
        <select class="browser-default custom-select" name="publish_unpublish">
            <option value="1" <?= ($result[0]['status'] == "1" ? "selected" : ""); ?>>Publish</option>
            <option value="0" <?= ($result[0]['status'] == "0" ? "selected" : ""); ?>>Unpublish</option>
        </select><br>

        <input type="hidden" name="blog_id" value="<?= $blog_id ?>">
        <div class="form-group" style="margin-top:10px;">
            <input type="text" value="<?= $result[0]['blog_title'] ?>" class="form-control" name="blog_title" placeholder="title">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="blog_desc" placeholder="Blog Desc"><?= $result[0]['blog_desc'] ?></textarea>
        </div>
        <div class="form-group">
            <img src="<?= base_url().$result[0]['blog_img'] ?>" width="120px" height="70px">
            <input type="file" class="form-control" name="file" placeholder="File">
        </div>

        <button type="submit" class="btn btn-primary">Edit Blog</button>
    </form>
</main>
</div>
</div>
<?php $this->load->view('adminpanel/footer.php'); ?>