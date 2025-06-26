<?php

return [
    'sidebar' => [
        'users' => [
            'group'    => 'User Management',
            'list'     => 'Users',
            'activate' => 'Activate Users',
        ],
        'feedback'   => 'Feedback',
        'error-logs' => 'Error Logs',
        'migrations' => 'Migrations',
        'test'       => 'Test',
        'api'        => 'Priint Api Tests',
        'seeding'    => 'Seeding',
        'xmlPriint'  => 'Import Categories Test',
        'xmlTest'    => 'Import MPR-XML Test',
        'back'       => 'Back to ' . SITE_NAME,
    ],
    'dashboard' => [
        'pageTitle' => 'Admin Dashboard | ' . SITE_NAME,
        'title'     => 'Admin Dashboard',
    ],
    'feedback' => [
        'pageTitle' => 'Feedback Evaluation | ' . SITE_NAME,
        'title'     => 'Feedback Evaluation',
        'desc'      => 'View user feedback.',
    ],
    'adminTools' => 'Admin Tools',
    'error-logs' => [
        'pageTitle' => 'Error Logs | ' . SITE_NAME,
        'title'     => 'Error Logs',
        'desc'      => 'View PHP Errors.',
    ],
    'migrations' => [
        'pageTitle' => 'Migrations | ' . SITE_NAME,
        'title'     => 'Migrations',
        'desc'      => 'Execute DB-migrations.',
    ],
    'seeding' => [
        'pageTitle' => 'Seeding | ' . SITE_NAME,
        'title'     => 'Seeding',
        'desc'      => 'Run DB-seeder.',
    ],
    'api' => [
        'pageTitle' => 'Priint Api Tests | ' . SITE_NAME,
        'title'     => 'Priint Api Tests',
    ],
    'test' => [
        'pageTitle' => 'Test | ' . SITE_NAME,
        'title'     => 'Test',
    ],
    'xmlPriint' => [
        'pageTitle' => 'Import Categories Test | ' . SITE_NAME,
        'title'     => 'Import Categories Test',
    ],
    'xmlTest' => [
        'pageTitle' => 'Import MPR-XML Test | ' . SITE_NAME,
        'title'     => 'Import MPR-XML Test',
    ],
    'language' => [
        'pageTitle' => 'Languages | ' . SITE_NAME,
        'title'     => 'Languages',
    ],
    'users' => [
        'desc' => 'List users. edit e-mail, password, names, permissions and user roles.',
    ],
    'usersActivate' => [
        'pageTitle'             => 'Activate Users | ' . SITE_NAME,
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
