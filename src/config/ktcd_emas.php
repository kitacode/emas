<?php

return [
    'event_table' => 'events',
    'session_type_table' => 'session_types',
    'session_table' => 'sessions',
    'speaker_table' => 'speakers',
    'format' => [
        'date' => [
            'yyyy-mm-dd' => 'Y-m-d',
            'dd-mm-yyyy' => 'd-m-Y',
            'mm-dd-yyyy' => 'm-d-Y',
            'dd MM yyyy' => 'd F Y',
            'dd M yyyy' => 'd M Y',
            'd M yyyy' => 'j M Y'
        ],
        'time' => [
            'hh:ii' => 'H:i',
            'HH:ii P' => 'h:i A'
        ]
    ]
];
