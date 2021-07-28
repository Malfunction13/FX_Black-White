<?php
namespace App\Services\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Throwable;


class UserManagementService {

    public function updateUser(Request $request, User $user) {
        $data = array_filter($request->except('_token', '_method')); //not secure, refactor to more explicit
        $user->update($data);

    }

    public function deleteUser(User $user) {
        $user->email = 'deleted' . uniqid("",true);
        $user->save();
        $user->delete();
    }

    public function activateUser(User $user) {
        $user->subscribed = true;
        $user->expiry_date = now()->addMonth();
        $user->subscription_count ++;
        $user->save();
    }

    public function deactivateUser(User $user) {
        $user->subscribed = false;
        $user->expiry_date = null;
        $user->save();
    }

    public function extendUser(User $user, string $months) {
        $expiry = Carbon::parse($user->expiry_date)->addMonths($months); //if curr exp date is null Carbon will return now()
        $user->subscribed = true;
        $user->expiry_date = $expiry;
        $user->subscription_count += $_POST['months'];
        $user->save();
    }
}
