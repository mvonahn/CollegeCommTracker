<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Contact_model
 */
class Contact_model extends CI_Model
{
    /**
     * Constructor
     *
     * @access public
     */
    public function __construct()
    {
        parent::__construct();
        log_message('debug', 'CCT: Contact Model loaded');
    }

    /**
     * @param $data
     */
    public function saveContact($data)
    {
        $this->db->where('id', $data->Id);
        unset($data->Id);
        $this->db->update('Communication', $data);

        return $this->db->affected_rows();
    }

    /**
     * @param $data
     */
    public function addContact($data)
    {
        $this->db->insert('Communication', $data);
        return $this->db->affected_rows();
    }
}
