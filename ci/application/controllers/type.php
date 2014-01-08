<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require_once('/home1/webfootd/www/sarah/ci/application/libraries/REST_Controller.php');

/**
 * Class University
 */
class Type extends REST_Controller
{
    public function index_get()
    {
        $this->load->model('Type_model', '', true);

        $types = $this->Type_model->getTypes();

        $this->response($types);
    }
}
