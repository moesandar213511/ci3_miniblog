<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $query = $this->db->query("SELECT * FROM `articles` ORDER BY blogid DESC");
        $data['result'] = $query->result_array();
        $this->load->view('adminpanel/viewblog',$data);
    }
    public function addblog()
    {
        $this->load->view('adminpanel/addblog');
    }
    public function addblog_post(){
        // echo "<pre>";
        // print_r($_POST);
        // print_r($_FILES);

        if($_FILES){
            //Image is passed
            $config['upload_path'] = './assets/upload/blogimg';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            // $config['max_size'] = 100;
            // $config['max_width'] = 1024;
            // $config['max_height'] = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
                die("Error");
                // $this->load->view('upload_form', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                // echo "<pre>";
                // print_r($data);
                echo $file = "assets/upload/blogimg/".$data['upload_data']['file_name'];
                echo $blog_title = $_POST['blog_title'];
                echo $blog_desc = $_POST['blog_desc'];

                $query = $this->db->query("INSERT INTO `articles`( `blog_title`, `blog_desc`, `blog_img`) VALUES ('$blog_title','$blog_desc','$file')");

                if($query){
                    $this->session->set_flashdata('inserted', 'yes');
                    redirect('admin/blog/addblog');
                }else{
                    $this->session->set_flashdata('inserted', 'no');
                    redirect('admin/blog/addblog');
                }
                // $this->load->view('upload_success', $data);
            }
        }else{
            //Image is note passed
        }
    }

    public function editblog($blog_id)
    {
        // print($blog_id);
        $query = $this->db->query("SELECT `blog_title`, `blog_desc`, `blog_img`, `status` FROM `articles` WHERE `blogid`='$blog_id'");

        $data['result'] = $query->result_array();
        $data['blog_id'] = $blog_id;
        $this->load->view('adminpanel/editblog',$data);
    }
    public function editblog_post()
    {
        // echo "<pre>";
    //    print_r($_POST); die();
    //    print_r($_FILES);
       if($_FILES['file']['name']){
        //    die("Update file");
            //Update Image
            $config['upload_path'] = './assets/upload/blogimg';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            // $config['max_size'] = 100;
            // $config['max_width'] = 1024;
            // $config['max_height'] = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
                die("Error");
                // $this->load->view('upload_form', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());

                // echo "<pre>";
                // print_r($data['upload_data']['file_name']);

                $filename_location = "assets/upload/blogimg/".$data['upload_data']['file_name'];
                $blog_title = $_POST['blog_title'];
                $blog_desc = $_POST['blog_desc'];
                $blog_id = $_POST['blog_id'];
                $publish_unpublish = $_POST['publish_unpublish'];


                $query = $this->db->query("UPDATE `articles` SET `blog_title`='$blog_title' ,`blog_desc`='$blog_desc',`blog_img`='$filename_location', `status`='$publish_unpublish' WHERE `blogid`='$blog_id'");

                if($query){
                    $this->session->set_flashdata('updated', 'yes');
                    redirect('admin/blog');
                }else{
                    $this->session->set_flashdata('updated', 'no');
                    redirect('admin/blog');
                }

            }
       }else{
        //    die("Update without file");
            $blog_title = $_POST['blog_title'];
            $blog_desc = $_POST['blog_desc'];
            $blog_id = $_POST['blog_id'];
            $publish_unpublish = $_POST['publish_unpublish'];

            $query = $this->db->query("UPDATE `articles` SET `blog_title`='$blog_title' ,`blog_desc`='$blog_desc', `status`='$publish_unpublish' WHERE `blogid`='$blog_id'");

            if ($query) {
                $this->session->set_flashdata('updated', 'yes');
                redirect('admin/blog');
            } else {
                $this->session->set_flashdata('updated', 'no');
                redirect('admin/blog');
            }
       }
    }
    public function deleteblog()
    {
        // print_r($_POST);

        $delete_id = $_POST['delete_id'];

        $query = $this->db->query("DELETE FROM `articles` WHERE `blogid`='$delete_id'");
        if($query){
            echo "deleted";
        }else{
            echo "notdeleted";
        }
    }
}
