<?php
return [
    'driver' => env('SCOUT_DRIVER', 'elasticsearch'),
    'queue' => false,
    'elasticsearch' => [
        'index' => env('ELASTICSEARCH_INDEX', 'charis'),
        'hosts' => [
            env('ELASTICSEARCH_HOST', 'http://localhost:9200'),
        ],
    ]
];