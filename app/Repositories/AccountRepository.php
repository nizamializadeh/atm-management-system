<?php
namespace App\Repositories;

use App\Models\Account;

class AccountRepository
{
    protected $model;

    public function __construct(Account $account)
    {
        $this->model = $account;
    }
    public function getAccountsByUserId($accountId)
    {
        return $this->model->where('id', $accountId)->first();
    }
    public function updateBalance($accountId, $amount)
    {
        $account = $this->model->findOrFail($accountId);
        $account->balance += $amount;
        $account->save();
        return $account;
    }


}
