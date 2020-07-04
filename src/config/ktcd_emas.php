<?php

$dateFormat = [
    'yyyy-mm-dd' => 'Y-m-d',
    'dd-mm-yyyy' => 'd-m-Y',
    'mm-dd-yyyy' => 'm-d-Y',
    'dd MM yyyy' => 'd F Y',
    'dd M yyyy' => 'd M Y',
    'd M yyyy' => 'j M Y'
];

$timeFormat = [
    'hh:ii' => 'H:i',
    'HH:ii P' => 'h:i A'
];

$datetimeFormat = [];

foreach ($dateFormat as $kd => $vd) {
    foreach ($timeFormat as $kt => $vt) {
        $datetimeFormat[$kd . ' ' . $kt] = $vd . ' ' . $vt;
    }
}

return [
    'event_table' => 'events',
    'price_table' => 'prices',
    'session_type_table' => 'session_types',
    'session_table' => 'sessions',
    'speaker_table' => 'speakers',
    'format' => [
        'date' => $dateFormat,
        'time' => $timeFormat,
        'datetime' => $datetimeFormat
    ]
];
