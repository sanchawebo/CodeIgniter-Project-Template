<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Exception;

class MigrationController extends BaseController
{
    public function index()
    {
        $data               = [];
        $data['title']      = 'Migrations';
        $migrate            = \Config\Services::migrations();
        $data['migrations'] = json_decode(json_encode($migrate->findMigrations()), true);

        krsort($data['migrations']);

        foreach ($data['migrations'] as $key => $value) {
            $method = 'up';

            foreach ($migrate->getHistory() as $history) {
                if ($migrate->getObjectUid($history) === $data['migrations'][$key]['uid']) {
                    $method = 'down';
                    break;
                }
            }
            helper('form');
            $buttonHtml = form_open('/admin/migration/single');
            $buttonHtml .= form_hidden('namespace', $data['migrations'][$key]['namespace']);
            $buttonHtml .= form_hidden('path', $data['migrations'][$key]['path']);
            $buttonHtml .= '<button type="submit" class="a-button a-button--';
            $buttonHtml .= ($method === 'up') ? 'primary' : 'secondary';
            $buttonHtml .= ' -fixed -without-icon">';
            $buttonHtml .= '<span class="a-button__label">';
            $buttonHtml .= ($method === 'up') ? 'Migrate' : 'Rollback';
            $buttonHtml .= '</span>';
            $buttonHtml .= '</button>';
            $buttonHtml .= form_close();

            $button                   = ['migrate/rollback' => $buttonHtml];
            $data['migrations'][$key] = $button + $data['migrations'][$key];
        }
        $data['migrationHistory'] = $migrate->getHistory();

        foreach ($data['migrationHistory'] as $key) {
            $key->time = date('Y-m-d H:i:s', $key->time);
        }
        $data['migrationHistory'] = json_decode(json_encode($data['migrationHistory']), true);

        return $this->returnFragment('admin/tools/migration-list', $data);
    }

    public function migrateAll()
    {
        try {
            $migrate = \Config\Services::migrations();
            $migrate->latest();
            $data['success'] = true;
        } catch (Exception $exc) {
            $data['success'] = false;
            $data['errors']  = json_decode(json_encode($exc), true);
        }

        return $this->returnFragment('admin/tools/migration-latest', $data);
    }

    public function migrateSingle()
    {
        $data      = $this->request->getPost();
        $namespace = $data['namespace'];
        $path      = $data['path'];

        try {
            $migrate = \Config\Services::migrations();

            $migrate->force($path, $namespace);
            $data['success'] = true;
        } catch (Exception $exc) {
            $data['success'] = false;
            $data['errors']  = json_decode(json_encode($exc), true);
        }

        return $this->returnFragment('admin/tools/migration-single', $data);
    }
}
