<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function userManagement(User $user) {

        return view('admin.user_management', ['user'=> $user]);
    }

    public function userUpdate(Request $request) {
        try {
            User::where('id', $request->id)->update($request->except('_token', '_method'));

            return back()->with('status', 'User updated successfully!');
        } catch (Exception $e){
            if ($e->getCode() === '23000') { //db integrity error code

                return back()->with('error', 'Duplication error! Check if Username or Email already exist!');
            }
            else {

                return back()->with('error', 'Unexpected error! Please try again or contact administrator!');
            }
        }
    }

    public function userDelete(User $user) {
        $user->delete();

        return back()->with('status', 'User deleted successfully!');
    }

    public function userActivate(User $user) {
        $user->subscribed = true;
        $user->expiry_date = now()->addMonth();
        $user->save();

        return back()->with('status', 'User activated successfully!');
    }

    public function userDectivate(User $user) {
        $user->subscribed = false;
        $user->expiry_date = null;
        $user->save();

        return back()->with('status', 'User deactivated successfully!');
    }

    public function userExtend(User $user) {
        $expiry = $user->expiry_date->addMonths($_POST['months']);
        $user->subscribed = true;
        $user->expiry_date = $expiry;
        $user->save();

        return back()->with('status', 'User subscription extended!');
    }
}
