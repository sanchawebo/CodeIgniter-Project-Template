<?php

return [
    'sidebar' => [
        'users' => [
            'group'    => 'Nutzerverwaltung',
            'list'     => 'Nutzer',
            'activate' => 'Nutzer aktivieren',
        ],
        'error-logs' => 'Fehlerprotokolle',
        'migrations' => 'Migrationen',
        'seeding'    => 'Seeding',
        'test'       => 'Test',
        'back'       => 'Zurück zu ' . SITE_NAME,
    ],
    'dashboard' => [
        'title' => 'Admin-Dashboard',
    ],
    'feedback' => [
        'title' => 'Feedback Evaluation',
        'desc'  => 'Benutzer-Feedback anzeigen.',
    ],
    'adminTools' => 'Admin Tools',
    'error-logs' => [
        'title' => 'Fehlerprotokolle',
        'desc'  => 'PHP-Fehler anzeigen.',
    ],
    'migrations' => [
        'title' => 'Migrationen',
        'desc'  => 'Führen Sie DB-Migrationen aus.',
    ],
    'seeding' => [
        'title' => 'Seeding',
        'desc'  => 'Führen Sie DB-Seeder aus.',
    ],
    'test' => [
        'title' => 'Test',
    ],
    'language' => [
        'title' => 'Sprachen',
    ],
    'users' => [
        'desc' => 'Benutzer auflisten. E-Mail, Passwort, Namen, Berechtigungen und Benutzerrollen bearbeiten.',
    ],
    'usersActivate' => [
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
