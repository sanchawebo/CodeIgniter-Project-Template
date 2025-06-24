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
        'back'       => 'Back to PDF Generator',
    ],
    'dashboard' => [
        'pageTitle' => 'Admin Dashboard | ' . lang('Basic.siteTitle'),
        'title'     => 'Admin Dashboard',
    ],
    'feedback' => [
        'pageTitle' => 'Feedback Evaluation | ' . lang('Basic.siteTitle'),
        'title'     => 'Feedback Evaluation',
        'desc'      => 'View user feedback.',
    ],
    'adminTools' => 'Admin Tools',
    'error-logs' => [
        'pageTitle' => 'Error Logs | ' . lang('Basic.siteTitle'),
        'title'     => 'Error Logs',
        'desc'      => 'View PHP Errors.',
    ],
    'migrations' => [
        'pageTitle' => 'Migrations | ' . lang('Basic.siteTitle'),
        'title'     => 'Migrations',
        'desc'      => 'Execute DB-migrations.',
    ],
    'seeding' => [
        'pageTitle' => 'Seeding | ' . lang('Basic.siteTitle'),
        'title'     => 'Seeding',
        'desc'      => 'Run DB-seeder.',
    ],
    'api' => [
        'pageTitle' => 'Priint Api Tests | ' . lang('Basic.siteTitle'),
        'title'     => 'Priint Api Tests',
    ],
    'test' => [
        'pageTitle' => 'Test | ' . lang('Basic.siteTitle'),
        'title'     => 'Test',
    ],
    'xmlPriint' => [
        'pageTitle' => 'Import Categories Test | ' . lang('Basic.siteTitle'),
        'title'     => 'Import Categories Test',
    ],
    'xmlTest' => [
        'pageTitle' => 'Import MPR-XML Test | ' . lang('Basic.siteTitle'),
        'title'     => 'Import MPR-XML Test',
    ],
    'language' => [
        'pageTitle' => 'Languages | ' . lang('Basic.siteTitle'),
        'title'     => 'Languages',
    ],
    'users' => [
        'desc' => 'List users. edit e-mail, password, names, permissions and user roles.',
    ],
    'usersActivate' => [
        'pageTitle'             => 'Activate Users | ' . lang('Basic.siteTitle'),
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
