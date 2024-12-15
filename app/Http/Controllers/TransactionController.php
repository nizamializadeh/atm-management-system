<?php

namespace App\Http\Controllers;

use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;

    }
    public function deleteTransaction($id)
    {
        try {
            // İstifadəçi yoxlanışı
            $user = Auth::user();

            if (!$user->isAdmin()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You do not have permission to delete transactions.',
                ], 403);
            }

            $result = $this->transactionRepository->deleteTransaction($id);

            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => 'Transaction deleted successfully.',
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'Transaction not found or could not be deleted.',
            ], 404);


        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

}

