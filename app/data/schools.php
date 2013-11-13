<?php
$school = array();

$school[] = array(
    'name'        => 'Lehigh University',
    'count'       => 3,
    'lastContact' => array(
        'date'        => '2013-10-22',
        'description' => 'Transcript and Tournament Schedule'
    ),
    'contacts'    => array(
        array(
            'date'        => '2013-10-21',
            'type'        => 'email received',
            'description' => 'Initial Interest through Ole'
        ),
        array(
            'date'        => '2013-10-21',
            'type'        => 'email sent',
            'description' => 'Thanks for coming to watch'
        ),
        array(
            'date'        => '2013-10-22',
            'type'        => 'email sent',
            'description' => 'Transcript and Tournament Schedule'
        )
    )
);

$school[] = array(
    'name' => 'MIT',
    'count' => 5,
    'lastContact'  => array(
        'date' => '2013-09-15',
        'description' => 'Transcript and Schedule'
    ),
    'contacts' => array(
        array(
            'date'        => '2013-09-11',
            'type'        => 'email Sent',
            'description' => 'Initial email and schedule'
        ),
        array(
            'date'        => '2013-09-12',
            'type'        => 'email received',
            'description' => 'Initial Interest through Ole'
        ),
        array(
            'date'        => '2013-10-21',
            'type'        => 'email sent',
            'description' => 'Thanks for coming to watch'
        ),
        array(
            'date'        => '2013-10-22',
            'type'        => 'email sent',
            'description' => 'Transcript and Tournament Schedule'
        ))
);

$school[] = array(
    'name' => 'Colorado School of Mines',
    'count' => 1,
    'lastContact'  => array(
        'date' => '2013-06-22',
        'description' => 'Intro and  Sparkler Game Schedule'
    ),
    'contacts' => array(
        array(
            'date' => '2013-06-22',
            'type' => 'email',
            'description' => 'Intro and  Sparkler Game Schedule'
        )
    )
);

echo json_encode($school);
