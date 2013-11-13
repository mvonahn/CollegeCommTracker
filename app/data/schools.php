<?php
$school = array();

$school[] = array(
    'name' => 'Lehigh University',
    'count' => 2,
    'lastContactDate' => '2013-10-22',
    'lastContactType' => 'Transcript and Schedule'
);

$school[] = array(
    'name' => 'MIT',
    'count' => 5,
    'lastContactDate' => '2013-09-15',
    'lastContactType' => 'Transcript and Schedule'
);

$school[] = array(
    'name' => 'Colorado School of Mines',
    'count' => 1,
    'lastContactDate' => '2013-6-22',
    'lastContactType' => 'Sparkler Game Schedule'
);

echo json_encode($school);