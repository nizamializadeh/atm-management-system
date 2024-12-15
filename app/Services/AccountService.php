<?php
namespace App\Services;

use App\Models\Atm;
use App\Repositories\AccountRepository;
use App\Repositories\TransactionRepository;

class AccountService
{
    protected $accountRepository;
    protected $transactionRepository;
    private $atmService;

    public function __construct(AccountRepository $accountRepository, ATMService $atmService,TransactionRepository $transactionRepository)
    {
        $this->accountRepository = $accountRepository;
        $this->atmService = $atmService;
        $this->transactionRepository = $transactionRepository;
    }
    public function withdraw($accountId, $amount)
    {

        $account = $this->accountRepository->getAccountsByUserId($accountId);


        if ($account->balance < $amount) {
            throw new \Exception('Insufficient balance.');
        }

        $withdrawal = $this->atmService->withdrawFromATM($amount);

        $account = $this->accountRepository->updateBalance($accountId, -$amount);

        $this->transactionRepository->createTransaction([
            'amount' => $amount,
            'type' => 'withdraw',
            'user_id' => $account->id,
        ]);

        return [
            'account' => $account,
            'withdrawal' => $withdrawal
        ];
    }

}
