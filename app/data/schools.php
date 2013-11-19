<?php
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

echo json_encode($school);
