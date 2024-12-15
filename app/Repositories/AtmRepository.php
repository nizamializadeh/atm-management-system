<?php
namespace App\Repositories;

use App\Models\Atm;
use Illuminate\Support\Facades\DB;

class AtmRepository
{
    protected $model;

    public function __construct(Atm $atm)
    {
        $this->model = $atm;
    }

    public function getAll()
    {
        return ATM::orderBy('value', 'desc')->get();
    }

    public function getTotalBalance()
    {
        return $this->model->sum(DB::raw('value * count'));
    }


    public function updateCount($id, $newCount)
    {
        $note = $this->model->findOrFail($id);
        $note->count = $newCount;
        $note->save();
    }



}
