<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class TestController extends BaseController
{
    protected const string VIEWPATH_MANUAL = 'segmentCatalogue/manualCreation/';
    protected const string VIEWPATH_EXCEL  = 'segmentCatalogue/excelImport/';
    protected const string VIEWPATH_REUSE  = 'segmentCatalogue/reuseOrder/';
    protected const int STEP_NUM_MANUAL    = 7;
    protected const int STEP_NUM_EXCEL     = 6;
    protected const int STEP_NUM_REUSE     = 8;

    public function index()
    {
        dd(count([5000]));
    }
}
