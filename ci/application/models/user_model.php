<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class User_model
 */
class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        log_message('debug', 'CCT: User Model loaded');
    }

    public function get_universities($userId = 0)
    {
        $sql =
<<<EOQ
SELECT
    University.Id as Id,
    Name,
    count(UniversityId) communicationCount
FROM
    University,
    Communication
WHERE
    University.Id = UniversityId
AND
    UserId = $userId
    group by UniversityId
EOQ;
        $query = $this->db->query($sql);
        $school = array();
        foreach ($query->result() as $row) {
            $school[$row->Id]= array(
                'id' => $row->Id,
                'name' => $row->Name,
                'count' => $row->communicationCount,
                'contacts' => $this->loadUniversityContacts($userId, $row->Id)
            );
            $school[$row->Id]['lastContact'] = $school[$row->Id]['contacts'][0];
        }
        return $school;
    }


    private function loadUniversityContacts($userId, $UniversityId)
    {
        $contact = array();
        $sql =
<<<EOQ
SELECT
    *
FROM
    Communication
WHERE
    UniversityId = $UniversityId
AND
    UserId = $userId
    order by CommunicationDate desc
EOQ;
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) {
            $contact[] = array(
            'Id' => $row->Id,
            'UniversityId' => $row->UniversityId,
            'date' => $row->CommunicationDate,
            'type' => $row->TypeId,
            'description' => $row->Description,
            'content' => $row->Content
            );
        }
        return $contact;
    }
}
