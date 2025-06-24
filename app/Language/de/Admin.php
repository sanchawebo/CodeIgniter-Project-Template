<?php

return [
    'sidebar' => [
        'users' => [
            'group'    => 'Nutzerverwaltung',
            'list'     => 'Nutzer',
            'activate' => 'Nutzer aktivieren',
        ],
        'admin-feedback' => 'Feedback',
        'error-logs'     => 'Fehlerprotokolle',
        'migrations'     => 'Migrationen',
        'seeding'        => 'Seeding',
        'api'            => 'Priint API-Tests',
        'test'           => 'Test',
        'xmlPriint'      => 'Import Categories Test',
        'xmlTest'        => 'Import MPR XML Test',

        'back' => 'Zurück zum PDF Generator',
    ],
    'dashboard' => [
        'pageTitle' => 'Admin-Dashboard | ' . lang('Basic.siteTitle'),
        'title'     => 'Admin-Dashboard',
    ],
    'feedback' => [
        'pageTitle' => 'Feedback Evaluation | ' . lang('Basic.siteTitle'),
        'title'     => 'Feedback Evaluation',
        'desc'      => 'Benutzer-Feedback anzeigen.',
    ],
    'adminTools' => 'Admin Tools',
    'error-logs' => [
        'pageTitle' => 'Fehlerprotokolle | ' . lang('Basic.siteTitle'),
        'title'     => 'Fehlerprotokolle',
        'desc'      => 'PHP-Fehler anzeigen.',
    ],
    'migrations' => [
        'pageTitle' => 'Migrationen | ' . lang('Basic.siteTitle'),
        'title'     => 'Migrationen',
        'desc'      => 'Führen Sie DB-Migrationen aus.',
    ],
    'seeding' => [
        'pageTitle' => 'Seeding | ' . lang('Basic.siteTitle'),
        'title'     => 'Seeding',
        'desc'      => 'Führen Sie DB-Seeder aus.',
    ],
    'api' => [
        'pageTitle' => 'Priint API-Tests | ' . lang('Basic.siteTitle'),
        'title'     => 'Priint API-Tests',
    ],
    'test' => [
        'pageTitle' => 'Test | ' . lang('Basic.siteTitle'),
        'title'     => 'Test',
    ],
    'xmlPriint' => [
        'pageTitle' => 'Import Categories | ' . lang('Basic.siteTitle'),
        'title'     => 'Import Categories',
    ],
    'xmlTest' => [
        'pageTitle' => 'Import MPR-XML | ' . lang('Basic.siteTitle'),
        'title'     => 'Import MPR-XML',
    ],
    'imgComp' => [
        'pageTitle' => 'ProductImages-Compression | ' . lang('Basic.siteTitle'),
        'title'     => 'ProductImages-Compression',
    ],
    'language' => [
        'pageTitle' => 'Sprachen | ' . lang('Basic.siteTitle'),
        'title'     => 'Sprachen',
    ],
    'users' => [
        'desc' => 'Benutzer auflisten. E-Mail, Passwort, Namen, Berechtigungen und Benutzerrollen bearbeiten.',
    ],
    'usersActivate' => [
        'pageTitle'             => 'Benutzer aktivieren | ' . lang('Basic.siteTitle'),
        'title'                 => 'Benutzer aktivieren',
        'desc'                  => 'Ausstehende Beitrittsanfragen freigeben.',
        'heading'               => 'Ausstehende Benutzer:',
        'tableHead1'            => 'Benutzer-E-Mail',
        'tableHead2'            => 'Aktionen',
        'actionActivate'        => 'Aktivieren',
        'actionDelete'          => 'Löschen',
        'noUsers'               => 'Keine ausstehenden Benutzer',
        'actionActivateSuccess' => 'Benutzer aktiviert',
        'actionDeleteSuccess'   => 'Benutzer gelöscht',
        'actionFailed'          => 'Angeforderte Aktion fehlgeschlagen',
    ],
];
