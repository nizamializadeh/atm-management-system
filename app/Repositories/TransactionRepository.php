<?php
namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    protected $model;

    public function __construct(Transaction $transaction)
    {
        $this->model = $transaction;
    }

    public function createTransaction(array $data)
    {
        return $this->model->create($data);
    }
    public function deleteTransaction($id)
    {
        $transaction = $this->model->find($id);
        if ($transaction) {
            return $transaction->delete();
        }

        return false;
    }

}
