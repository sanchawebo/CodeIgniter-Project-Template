<?php

// cSpell:ignore superadmins

return [
    'pageTitle' => 'Site Settings | ' . lang('ScpBasic.siteTitle'),
    'title'     => 'Site Settings',
    'desc'      => 'Edit general site settings.',
    'general'   => [
        'head'        => 'General Settings',
        'checkLabel'  => 'Site Online?',
        'checkHelper' => 'If unchecked, only superadmins and user groups with permission can access the site.',
    ],
    'saveSettings'  => 'Save settings',
    'resourceSaved' => 'Settings saved',
];
