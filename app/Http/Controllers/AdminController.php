<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function adminPanelShow()
    {
        return view('admin.admin-panel');
    }
}
