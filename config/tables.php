<?php

return [
    'dark_mode' => config('components.dark_mode'),

    'layout' => [
        'action_alignment' => 'right',
        'default_pagination_view' => 'tables::components.pagination.index'
    ],

    'formats' => [
        'date' => 'M j, Y',
        'datetime' => 'M j, Y H:i:s',
        'time' => 'H:i:s',
    ],
];
