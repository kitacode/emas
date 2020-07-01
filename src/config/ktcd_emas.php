<?php

return [
    'event_table' => 'events',
    'format' => [
        'date' => [
            'yyyy-mm-dd' => 'Y-m-d',
            'dd-mm-yyyy' => 'd-m-Y',
            'mm-dd-yyyy' => 'm-d-Y',
            'dd MM yyyy' => 'd F Y',
            'dd M yyyy' => 'd M Y'
        ],
        'datetime' => [
            'yyyy-mm-dd hh:ii' => 'Y-m-d H:i',
            'dd-mm-yyyy hh:ii' => 'd-m-Y H:i',
            'mm-dd-yyyy hh:ii' => 'm-d-Y H:i',
            'dd MM yyyy hh:ii' => 'd F Y H:i',
            'dd M yyyy hh:ii' => 'd M Y H:i',
            'yyyy-mm-dd HH:ii P' => 'Y-m-d h:i A',
            'dd-mm-yyyy HH:ii P' => 'd-m-Y h:i A',
            'mm-dd-yyyy HH:ii P' => 'm-d-Y h:i A',
            'dd MM yyyy HH:ii P' => 'd F Y h:i A',
            'dd M yyyy HH:ii P' => 'd M Y h:i A'
        ]
    ]
];
