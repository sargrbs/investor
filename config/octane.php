<?php


return [
    'server' => env('OCTANE_SERVER', 'swoole'),

    'swoole' => [
        'options' => [
            'worker_num' => 4,
            'task_worker_num' => 4,
            'enable_coroutine' => true,
            'max_request' => 1000,
        ],
    ],
];
