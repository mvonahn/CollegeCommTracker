<?php


class University_model extends CI_Model
{
    public function getUniversities()
    {
        $sql =
<<<EOQ
SELECT
    *
FROM
    University
Order By
    Name
EOQ;
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) {
            $university[] = $row;
        }
        return $university;
    }
}
