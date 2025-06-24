<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Files\FileCollection;

class SeederController extends BaseController
{
    public function index()
    {
        $seederFiles = new FileCollection();
        $seederFiles->addDirectory(APPPATH . 'Database/Seeds')->retainPattern('#[A-Za-z]+Seeder\.php#');
        $seederArray = [];

        foreach ($seederFiles as $file) {
            $seederArray[] = [
                'fileName'     => $file->getBasename(),
                'className'    => $file->getBasename('.' . $file->getExtension()),
                'modifiedDate' => $file->getMTime(),
            ];
        }
        usort($seederArray, [SeederController::class, 'cmp']);
        $data['files'] = $seederArray;

        return $this->returnFragment('admin/tools/seeder-list', $data);
    }

    public function runSeeder(string $seederName)
    {
        try {
            $seeder = \Config\Database::seeder();
            $seeder->call($seederName);
            $data['success'] = true;
            $data['name']    = $seederName;
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // d($e->getMessage());
            $data['success'] = false;
            $data['name']    = $seederName;
            $data['message'] = $e->getMessage();
            $data['trace']   = $e->getTrace();
        }

        return view('admin/tools/_seed', $data);
    }

    private static function cmp($a, $b)
    {
        return $b['modifiedDate'] <=> $a['modifiedDate'];
    }
}
