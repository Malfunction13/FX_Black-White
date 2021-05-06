<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminManagementController extends Controller
{
    public function adminManagement() {

        return view('admin\adm_management', ['admins'=> User::where('role', "!=", 0)->get()]);
    }
}
