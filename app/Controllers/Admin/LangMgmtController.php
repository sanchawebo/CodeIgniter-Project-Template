<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\LanguageExcelLibrary;
use CodeIgniter\Files\FileCollection;

class LangMgmtController extends BaseController
{
    protected $viewPath = 'admin/lang/';

    public function index()
    {
        helper('filesystem');

        $langFolders = directory_map(APPPATH . 'Language', 1);

        $langFolders = directory_map(APPPATH . 'Language', 1);
        $langMap     = [];

        foreach ($langFolders as $key => $langFolder) {
            $folderPath = APPPATH . 'Language' . DIRECTORY_SEPARATOR . $langFolder;
            if (is_dir($folderPath)) {
                $langFiles = new FileCollection();
                $langFiles->addDirectory(APPPATH . 'Language/' . $langFolder);
                $langFiles->retainPattern('*.php');

                $langMap[rtrim($langFolder, DIRECTORY_SEPARATOR)] = $langFiles->get();
            }
        }

        $data = [
            'langMap' => $langMap,
        ];

        return $this->returnFragment($this->viewPath . 'index', $data);
    }

    public function export()
    {
        helper('filesystem');

        $langFolders = directory_map(APPPATH . 'Language', 1);

        $langFolders = directory_map(APPPATH . 'Language', 1);
        $langMap     = [];

        foreach ($langFolders as $key => $langFolder) {
            $folderPath = APPPATH . 'Language' . DIRECTORY_SEPARATOR . $langFolder;
            if (is_dir($folderPath)) {
                $langFiles = new FileCollection();
                $langFiles->addDirectory(APPPATH . 'Language/' . $langFolder);
                $langFiles->retainPattern('*.php');

                $langMap[rtrim($langFolder, DIRECTORY_SEPARATOR)] = $langFiles->get();
            }
        }
        $langExcelLib = new LanguageExcelLibrary();

        return $langExcelLib->outputExcel($langMap);
    }

    public function import()
    {

    }
}
