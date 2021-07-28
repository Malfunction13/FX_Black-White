<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdmDashboardController extends Controller {
    public function dashboard(Request $request) {

        return view('admin\adm_dashboard');
    }

}
