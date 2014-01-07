<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require_once('/home1/webfootd/www/sarah/ci/application/libraries/REST_Controller.php');

/**
 * Class University
 */
class University extends REST_Controller
{
    public function index_get()
    {
        $this->load->model('University_model', '', true);

        $universities = $this->University_model->getUniversities();

        $this->response($universities);
    }
}
