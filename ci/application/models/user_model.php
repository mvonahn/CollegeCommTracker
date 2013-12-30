<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class User_model
 */
class User_model extends CI_Model
{

    /**
     * Constructor
     *
     * @access public
     */
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
        $school = array();
        foreach ($query->result() as $row) {
            $school[]= array(
                'id' => $row->Id,
                'name' => $row->Name,
                'count' => $row->communicationCount,
                'lastContact' => array(
                    'date' => $row->CommunicationDate,
                    'description' => $row->Description
                ),
                'contacts' => $this->loadUniversityContacts($userId, $row->Id)
            );
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
            'description' => $row->Description
            );
        }
        return $contact;
    }



    public function get_school()
    {

        $school = array();

        $school[] = array(
            'id' => 1,
            'name'        => 'Lehigh University',
            'count'       => 3,
            'lastContact' => array(
                'date'        => '2013-10-22',
                'description' => 'Transcript and Tournament Schedule'
            ),
            'contacts'    => array(
                array(
                    'id'          => 1,
                    'date'        => '2013-10-21',
                    'type'        => 'email received',
                    'description' => 'Initial Interest through Ole'
                ),
                array(
                    'id'          => 2,
                    'date'        => '2013-10-21',
                    'type'        => 'email sent',
                    'description' => 'Thanks for coming to watch'
                ),
                array(
                    'id'          => 3,
                    'date'        => '2013-10-22',
                    'type'        => 'email sent',
                    'description' => 'Transcript and Tournament Schedule'
                )
            )
        );

        $school[] = array(
            'id' => 2,
            'name'        => 'MIT',
            'count'       => 5,
            'lastContact' => array(
                'date'        => '2013-09-15',
                'description' => 'Transcript and Schedule'
            ),
            'contacts'    => array(
                array(
                    'id'          => 4,
                    'date'        => '2013-09-11',
                    'type'        => 'email Sent',
                    'description' => 'Initial email and schedule'
                ),
                array(
                    'id'          => 5,
                    'date'        => '2013-09-12',
                    'type'        => 'email received',
                    'description' => 'Initial Interest through Ole'
                ),
                array(
                    'id'          => 6,
                    'date'        => '2013-10-21',
                    'type'        => 'email sent',
                    'description' => 'Thanks for coming to watch'
                ),
                array(
                    'id'          => 7,
                    'date'        => '2013-10-22',
                    'type'        => 'email sent',
                    'description' => 'Transcript and Tournament Schedule'
                )
            )
        );

        $school[] = array(
            'id' => 3,
            'name' => 'Colorado School of Mines',
            'count' => 1,
            'lastContact'  => array(
                'date' => '2013-06-22',
                'description' => 'Intro and  Sparkler Game Schedule'
            ),
            'contacts' => array(
                array(
                    'id'          => 8,
                    'date' => '2013-06-22',
                    'type' => 'email',
                    'description' => 'Intro and  Sparkler Game Schedule'
                )
            )
        );

        return $school;
    }
}
