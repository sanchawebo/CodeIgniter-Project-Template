<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Database\MigrationRunner;
use Config\Services;
use Exception;

class MigrationController extends BaseController
{
    /**
     * @var MigrationRunner
     */
    protected $migrationService;

    public function __construct()
    {
        $this->migrationService = Services::migrations();
        $this->migrationService->setNamespace(null);
    }

    public function index()
    {
        $data               = [];
        $data['title']      = 'Migrations';
        $data['migrations'] = json_decode(json_encode($this->migrationService->findMigrations()), true);

        krsort($data['migrations']);

        foreach ($data['migrations'] as $key => $value) {
            $method = 'up';

            foreach ($this->migrationService->getHistory() as $history) {
                if ($this->migrationService->getObjectUid($history) === $data['migrations'][$key]['uid']) {
                    $method = 'down';
                    break;
                }
            }
            helper('form');
            $buttonHtml = form_open('/admin/migration/single');
            $buttonHtml .= form_hidden('namespace', $data['migrations'][$key]['namespace']);
            $buttonHtml .= form_hidden('path', $data['migrations'][$key]['path']);
            $buttonHtml .= '<button type="submit" class="btn btn-';
            $buttonHtml .= ($method === 'up') ? 'primary' : 'secondary';
            $buttonHtml .= ' -fixed -without-icon">';
            $buttonHtml .= ($method === 'up') ? 'Migrate' : 'Rollback';
            $buttonHtml .= '</button>';
            $buttonHtml .= form_close();

            $button                   = ['migrate/rollback' => $buttonHtml];
            $data['migrations'][$key] = $button + $data['migrations'][$key];
        }
        $data['migrationHistory'] = $this->migrationService->getHistory();

        foreach ($data['migrationHistory'] as $key) {
            $key->time = date('Y-m-d H:i:s', $key->time);
        }
        $data['migrationHistory'] = json_decode(json_encode($data['migrationHistory']), true);

        return $this->returnFragment('admin/tools/migration-list', $data);
    }

    public function migrateAll()
    {
        try {
            $this->migrationService->latest();
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
            $this->migrationService->force($path, $namespace);
            $data['success'] = true;
        } catch (Exception $exc) {
            $data['success'] = false;
            $data['errors']  = json_decode(json_encode($exc), true);
        }

        return $this->returnFragment('admin/tools/migration-single', $data);
    }
}
