<?php

namespace App\Http\Controllers;

use App\Contracts\CollectionPaginator;
use App\Services\UserService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{

    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }

    public function getUserData()
    {
        try {
            $data = $this->userService->UsersData();
            return view('user-data', ['info' => $data]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getUserTransactions($client_id)
    {
        $data = $this->userService->UserTransactions($client_id);
        return view('user-transactions', ['transactions' => $$data]);
    }
}
