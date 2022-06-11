<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    static function simplePolicy()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: ../login');
            return;
        }
    }
}
