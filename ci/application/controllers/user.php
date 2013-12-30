<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require_once('/home1/webfootd/www/sarah/ci/application/libraries/REST_Controller.php');

/**
 * Class Welcome
 */
class User extends REST_Controller
{

    public function index_get()
    {
        $this->load->database();
        $this->response($this->db->get('User')->result());
    }

    public function contact_get()
    {
        $this->load->model('User_model', '', true);

        $school = $this->User_model->get_universities(1);

        $this->response($school);
    }

    public function contact_post($id)
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->response($data);
    }

}
/* End of file user.php */
/* Location: ./application/controllers/user.php */
