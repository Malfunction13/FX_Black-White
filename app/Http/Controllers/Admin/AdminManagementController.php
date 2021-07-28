<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminManagementController extends Controller {
    public function adminOverview() {
        $admins = User::where('role', "!=", 0)->get();

        return view('admin\adm_management', ['admins'=> $admins]);
    }
}
