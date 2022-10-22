<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class UserApiController extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index($id)
    {
        $data = $this->userService->UsersDataApi()->firstWhere('user_id',$id);
        $transactions = $this->userService->UserTransactions($id)->items();
        $data->transactions = $transactions;
        return response()->json($data, 200);
    }
}
