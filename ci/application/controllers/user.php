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

    public function contact_post($id = 0)
    {
        $data = json_decode(file_get_contents("php://input"));
        $data->UserId = 1;
        $this->load->model('Contact_model', '', true);
        if($id == 0) {
            $result = $this->Contact_model->addContact($data);
        } else {
            $data->Id = $id;
            $result = $this->Contact_model->saveContact($data);
        }
        $this->response($result);
    }
}
/* End of file user.php */
/* Location: ./application/controllers/user.php */
