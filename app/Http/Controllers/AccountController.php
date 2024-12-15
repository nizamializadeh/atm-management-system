<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AccountService;

class AccountController extends Controller
{
    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function withdraw(Request $request, $id)
    {
        try {
            $amount = $request->input('amount');
            $result = $this->accountService->withdraw($id, $amount);

            return response()->json([
                'success' => true,
                'account' => $result['account'],
                'withdrawal' => $result['withdrawal']
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }

}

