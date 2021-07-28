<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ActivateUserRequest;
use App\Http\Requests\User\DeactivateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\ExtendUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\Users\UserSearchService;
use App\Services\Users\UserManagementService;
use Illuminate\Contracts\View\View;
use Throwable;

class UserManagementController extends Controller {

    public function userOverview(Request $request, UserSearchService $userSearchService) {
        if($request->ajax()) {
            $users = $userSearchService->filteredSearchHandler('latest',intval($request->query('page')));

            return response()->json([
                'data' => $users,
                'status' => 'success',
                'message' => "Search complete, total {$users->total()} results!"
            ]);
        }

        return view('admin.user_overview', ['users' => $userSearchService->filteredSearchHandler('latest')]);
    }

    public function userSearch(Request $request, UserSearchService $userSearchService) {
        try {
            $column = $request->query('criteria');
            $search = $request->query('search');
            $page = intval($request->query('page'));

            $users = $userSearchService->userSearch($column, $search, $page);

            return response()->json([
                'data' => $users,
                'status' => 'success',
                'message' => "Search complete, total {$users->total()} results!"]);
        } catch (Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error, try again later or contact administration.',],
                500);
        }
    }

    public function filteredSearch (Request $request, UserSearchService $userSearchService) {
        try {
            $users = $userSearchService->filteredSearchHandler($request->query('filter'),
                $request->query('page'));

            return response()->json([
                'data' => $users,
                'status' => 'success',
                'message' => "Search complete, total {$users->total()} results!",]);
        } catch (Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error, try again later or contact administration.',
            ], 500);
        }
    }

    public function userDetails(User $user) {

        return view('admin.user_details', ['user'=> $user]);
    }

    public function userUpdate(StoreUserRequest $request, User $user, UserManagementService $userManagementService) {
        try {
            $userManagementService->updateUser($request, $user);

            return response()->json(['data' => $user->refresh(),
                'status' => 'success',
                'message' => 'User updated successfully!',]);
        } catch (Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error, try again later or contact administration.',],
                500);
        }

    }

    public function userDelete(DeleteUserRequest $request, User $user, UserManagementService $userManagementService) {
       try {
           $userManagementService->deleteUser($user);

           return redirect()->route('userOverview')->with(['status' => 'User deleted successfully!']);
       } catch (Throwable $e) {

           return response()->json([
               'status' => 'error',
               'message' => 'Unexpected error, try again later or contact administration.',
           ], 500);
       }
    }

    public function userActivate(ActivateUserRequest $request, User $user,UserManagementService $userManagementService) {
        if ($user->subscribed) {

            return response()->json(['status' => 'error', 'message' => 'User already active!']);
        }
        try {
            $userManagementService->activateUser($user);

            return response()->json([
                'data' => $user->refresh(),
                'status' => 'success',
                'message' => 'User activated!']);
        } catch (Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error, try again later or contact administration.',
            ], 500);}
    }

    public function userDeactivate(DeactivateUserRequest $request, User $user, UserManagementService $userManagementService) {
        if (!$user->subscribed) {

            return response()->json(['status' => 'error', 'message' => 'User already inactive!']);
        }
        try {
            $userManagementService->deactivateUser($user);

            return response()->json([
                'data' => $user->refresh(),
                'status' => 'success',
                'message' => 'User deactivated!']);
        } catch (Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error, try again later or contact administration.',
            ], 500);
        }
    }

    public function userExtend(ExtendUserRequest $request, User $user, UserManagementService $userManagementService) {
        try {
            $userManagementService->extendUser($user, $request['months']);

            return response()->json([
                'data' => $user->refresh(),
                'status' => 'success',
                'message' => 'Subscription extended!',]);
        } catch (Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error, try again later or contact administration.',
            ], 500);
        }
    }
}
