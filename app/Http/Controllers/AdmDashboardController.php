<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use Exception;

use App\Models\User;
use phpDocumentor\Reflection\Types\Integer;

class AdmDashboardController extends Controller
{
    public function dashboard() {
        $users = DB::table('users')->whereNull('deleted_at')->paginate(10); //make sure its not soft deleted

        return view('admin\adm_dashboard', ['users'=> $users]);
    }

    public function userDetails(User $user) {


        return view('admin\user_details', ['user'=> $user]);
    }

}
