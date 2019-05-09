<?php

namespace App\Repo;

use Illuminate\Http\Request;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    public function index(Request $request)
    {
        if (isset($request->search)) {
            if ($request->searchUserFor == 'name')
                $paginatedUserData = User::where('name', 'like', '%' . $request->search . '%')->paginate(config('paginate.perPage'));
            if ($request->searchUserFor == 'email')
                $paginatedUserData = User::where('email', 'like', '%' . $request->search . '%')->paginate(config('paginate.perPage'));
        } else {
            $paginatedUserData = User::paginate(config('paginate.perPage'));
        }

        $listPaginatedUsers = collect($paginatedUserData->items());
        $perPage = $paginatedUserData->perPage();
        $total = $paginatedUserData->total();
        $currentPage = $paginatedUserData->currentPage();
        $compacts = [
            'listPaginatedUsers' => $listPaginatedUsers,
            'perPage' => $perPage,
            'total' => $total,
            'currentPage' => $currentPage,
        ];

        return $compacts;
    }
}
