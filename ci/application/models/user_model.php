<?php


/**
 * Class User_Model
 */
class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->_prefix = '';

        log_message('debug', 'CCT: User Model loaded');
    }

    public function get_universities($userId = 0)
    {
        $sql =
<<<EOQ
SELECT
    Name,
    CommunicationDate,
    Description,
    count(UniversityId) communicationCount
FROM
    University,
    Communication
WHERE
    University.Id = UniversityId
AND
    UserId = $userId
    group by UniversityId
    order by CommunicationDate desc
EOQ;
        $query = $this->db->query($sql);
        $school = [];
        foreach ($query->result() as $row) {
            $school[]= array(
                'id' => $row->Id,
                'name'        => $row->Name,
                'count'       => $row->communicationCount,
                'lastContact' => array(
                    'date'        => $row->CommunicationDate,
                    'description' => $row->Description
                ),
                'contacts' => []
            );
        }
        return $school;
    }
}
