<?php

namespace App\Http\Controllers\Web\User;

use App\Core\Controller;

class DatabaseBackupController extends Controller
{
    public function index()
    {
        return view('user.modules.databaseBackup.index.index');
    }
}
