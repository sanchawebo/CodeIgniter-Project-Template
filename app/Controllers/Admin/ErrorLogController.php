<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Response;
use Logs\ErrorLogs;

class ErrorLogController extends BaseController
{
    public function index()
    {
        $logs  = new ErrorLogs();
        $dates = $logs->getLogDatesArray('desc');

        $pager = \Config\Services::pager();

        $page    = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 10;
        $total   = count($dates);
        $offset  = (($page - 1) * $perPage);

        // Call makeLinks() to make pagination links.
        $pagerLinks = $pager->makeLinks($page, $perPage, $total, 'custom_full');

        $data = [
            'dates'      => array_slice($dates, $offset, $perPage),
            'pagerLinks' => $pagerLinks,
        ];

        return $this->returnFragment('admin/tools/error-list', $data);
    }

    public function view(string $date)
    {
        $keywords = [
            'CRITICAL',
            'ALERT',
            'EMERGENCY',
            'ERROR',
            'WARNING',
        ];
        $response = response();
        $response->setHeader('Content-type', 'text/html');
        $response->noCache();

        $logger = new ErrorLogs();
        $log    = $logger->getLogByDate($date, $keywords)->sort('dateTime');

        // Return early if no log was found.
        if ($log === null) {
            $response->setStatusCode(Response::HTTP_OK);
            $response->setBody('<h3>No log file found!</h3>');

            return $response;
        }

        $data = ['log' => $log];
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(view('admin/tools/error-single', $data));

        return $response;
    }
}
