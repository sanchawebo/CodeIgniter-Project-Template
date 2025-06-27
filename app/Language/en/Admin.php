<?php

return [
    'sidebar' => [
        'users' => [
            'group'    => 'User Management',
            'list'     => 'Users',
            'activate' => 'Activate Users',
        ],
        'error-logs' => 'Error Logs',
        'migrations' => 'Migrations',
        'seeding'    => 'Seeding',
        'test'       => 'Test',
        'back'       => 'Back to ' . SITE_NAME,
    ],
    'dashboard' => [
        'title' => 'Admin Dashboard',
    ],
    'feedback' => [
        'title' => 'Feedback Evaluation',
        'desc'  => 'View user feedback.',
    ],
    'adminTools' => 'Admin Tools',
    'error-logs' => [
        'title' => 'Error Logs',
        'desc'  => 'View PHP Errors.',
    ],
    'migrations' => [
        'title' => 'Migrations',
        'desc'  => 'Execute DB-migrations.',
    ],
    'seeding' => [
        'title' => 'Seeding',
        'desc'  => 'Run DB-seeder.',
    ],
    'test' => [
        'title' => 'Test',
    ],
    'language' => [
        'title' => 'Languages',
    ],
    'users' => [
        'desc' => 'List users. edit e-mail, password, names, permissions and user roles.',
    ],
    'usersActivate' => [
        'title'                 => 'Activate Users',
        'desc'                  => 'Approve pending membership requests.',
        'heading'               => 'Pending Users:',
        'noUsers'               => 'No pending users',
        'tableHead1'            => 'User E-Mail',
        'tableHead2'            => 'Actions',
        'actionActivate'        => 'Activate',
        'actionActivateSuccess' => 'User activated',
        'actionDelete'          => 'Delete',
        'actionDeleteSuccess'   => 'User deleted',
        'actionFailed'          => 'Requested action failed',
    ],
];
