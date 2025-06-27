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
        'test'           => 'Test',

        'back' => 'Zurück zu ' . SITE_NAME,
    ],
    'dashboard' => [
        'pageTitle' => 'Admin-Dashboard | ' . SITE_NAME,
        'title'     => 'Admin-Dashboard',
    ],
    'feedback' => [
        'pageTitle' => 'Feedback Evaluation | ' . SITE_NAME,
        'title'     => 'Feedback Evaluation',
        'desc'      => 'Benutzer-Feedback anzeigen.',
    ],
    'adminTools' => 'Admin Tools',
    'error-logs' => [
        'pageTitle' => 'Fehlerprotokolle | ' . SITE_NAME,
        'title'     => 'Fehlerprotokolle',
        'desc'      => 'PHP-Fehler anzeigen.',
    ],
    'migrations' => [
        'pageTitle' => 'Migrationen | ' . SITE_NAME,
        'title'     => 'Migrationen',
        'desc'      => 'Führen Sie DB-Migrationen aus.',
    ],
    'seeding' => [
        'pageTitle' => 'Seeding | ' . SITE_NAME,
        'title'     => 'Seeding',
        'desc'      => 'Führen Sie DB-Seeder aus.',
    ],
    'test' => [
        'pageTitle' => 'Test | ' . SITE_NAME,
        'title'     => 'Test',
    ],
    'language' => [
        'pageTitle' => 'Sprachen | ' . SITE_NAME,
        'title'     => 'Sprachen',
    ],
    'users' => [
        'desc' => 'Benutzer auflisten. E-Mail, Passwort, Namen, Berechtigungen und Benutzerrollen bearbeiten.',
    ],
    'usersActivate' => [
        'pageTitle'             => 'Benutzer aktivieren | ' . SITE_NAME,
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
