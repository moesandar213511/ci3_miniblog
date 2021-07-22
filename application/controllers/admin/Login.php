<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
        if (isset($_SESSION['user_id'])) {
            redirect('admin/dashboard');            
        }
        $data = [];
        if(isset($_SESSION['error'])){
            // die($_SESSION['error']);
            $data['error'] = $_SESSION['error'];
        }else{
            $data['error'] = "NO_ERROR";
        }
        // $this->load->helper('url'); in autoload.php
        $this->load->view('adminpanel/loginview',$data);
    }
    public function login_post(){
        // print_r($_POST);
        if(isset($_POST)){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = $this->db->query("SELECT * FROM `backenduser` WHERE `username`='$username' AND `password`='$password'");
            // print_r($query);
            if($query->num_rows()){
                $result = $query->result_array();
                // echo "<pre>";
                // print_r($result); die();
                // $this->load->library('session'); //or in autoload.php
                $this->session->set_userdata('user_id',$result[0]['uid']);
                // $this->session->set_userdata('username', $result[0]['username']);

                redirect('admin/dashboard');
            }else{ 
            //    echo "something wrong"; 
                $this->session->set_flashdata('error', 'Invalid Credentials');
                redirect('admin/login');

            }

        }else{
            die('Invalid Input');
        }
    }

    public function logout(){
        session_destroy();
        redirect('admin/login');
    }
}
