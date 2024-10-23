<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;

class AdminController extends Controller
{


    public function adminPanelShow()
    {
        $speakers =  Speaker::all();
        return view('admin.admin-panel');
    }
}
