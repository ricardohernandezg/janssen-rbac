<?php 

return [
    // redis settings, connection defined in connections section in engine.php
    'redis' => [
        'connection' => 'redis'
    ],
    // table where we'll store the permission rows
    'source' => [
        'usertypes_table' => 'user_types',
        'roles_table' => 'roles',
        'modules_table' => 'modules',
        'users_table' => 'users',
        'permisology_table' => 'permisology',
    ],
    // the fields that we'll associate to each check type
    'checks' => [
        'user_type' => '',
        'user_role' => '',
        'user_id' => ''
    ]
];