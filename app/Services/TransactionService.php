<?php
namespace App\Services;

use App\Repositories\TransactionRepository;
use App\Repositories\AccountRepository;

class TransactionService
{
    protected $transactionRepository;
    protected $accountRepository;

    public function __construct(TransactionRepository $transactionRepository, AccountRepository $accountRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->accountRepository = $accountRepository;
    }

    public function createTransaction($userId, $accountId, $type, $amount)
    {
        $account = $this->accountRepository->findById($accountId);

        if ($type === 'withdraw' && $account->balance < $amount) {
            throw new \Exception('Balans kifayət deyil.');
        }

        $balanceChange = $type === 'withdraw' ? -$amount : $amount;
        $this->accountRepository->updateBalance($accountId, $balanceChange);

        return $this->transactionRepository->create([
            'user_id' => $userId,
            'amount' => $amount,
            'type' => $type,
        ]);
    }

    public function getUserTransactions($userId)
    {
        return $this->transactionRepository->getAllByUserId($userId);
    }
}
