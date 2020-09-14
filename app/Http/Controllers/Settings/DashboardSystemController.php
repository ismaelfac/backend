<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardSystemController extends Controller
{
    //
    public function index()
    {
        return view('admin.content_system');
    }
}
