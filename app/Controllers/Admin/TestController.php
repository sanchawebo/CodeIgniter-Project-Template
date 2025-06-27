<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class TestController extends BaseController
{
    public function index()
    {
        return view('admin/test', [
            'data' => [
                'title'     => 'Test Controller',
                'message'   => 'This is a test message.',
                'timestamp' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
