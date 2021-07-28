<?php
namespace App\Services\Users;

use App\Models\User;

class UserSearchService {

    public function getAllUsers($page = null) { // strong typing int|null makes the ide yell and asks to change config files
        $users = User::latest()->paginate(10, ['*'], 'page', $page);

        return $users;
    }

    public function filteredSearchHandler($criteria, $page=null) {
        switch ($criteria) {
            case 'subscribed':

                return $this->subscribed($page);
            case 'unsubscribed':

                return $this->unsubscribed($page);
            case 'subscriptions':

                return $this->subscriptions($page);
            case 'latest':

                return $this->latest($page);
            case 'oldest':

                return $this->oldest($page);
        }
    }

    public function userSearch(string $column,string|null $search, $page) {

        return User::where($column, 'LIKE', "%$search%")->paginate(10,['*'],'page', $page);
    }

    public function subscribed($page) {

        return User::where('subscribed', "=", true)->orderByDesc('created_at')
            ->paginate(10,['*'],'page', $page);
    }

    public function unsubscribed($page) {

        return User::where('subscribed', "=", false)->orderByDesc('created_at')
            ->paginate(10,['*'],'page', $page);
    }

    public function subscriptions($page) {

        return User::orderBy('subscription_count', 'DESC')->paginate(10,['*'],'page', $page);
    }

    public function latest($page) {

        return User::orderBy('created_at', 'DESC')->whereNull('deleted_at')
            ->paginate(10,['*'],'page', $page);
    }

    public function oldest($page) {

        return User::whereNull('deleted_at')->paginate(10,['*'],'page', $page);
    }


}
