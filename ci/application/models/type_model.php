<?php


class Type_model extends CI_Model
{
    public function getTypes()
    {
        $sql =
<<<EOQ
SELECT
    *
FROM
    CommunicationType
Order By
    Label
EOQ;
        $types = array();
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) {
            $types[] = $row;
        }
        return $types;
    }
}
