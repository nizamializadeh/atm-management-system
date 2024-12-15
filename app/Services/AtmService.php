<?php
namespace App\Services;

use App\Repositories\AtmRepository;

class AtmService
{
    protected $atmRepository;

    public function __construct(AtmRepository $atmRepository)
    {
        $this->atmRepository = $atmRepository;
    }

    public function withdrawFromATM($amount)
    {

        $totalATMFunds = $this->atmRepository->getTotalBalance();
        if ($amount > $totalATMFunds) {
            throw new \Exception("Not enough total balance at ATM.");
        }

        $atmNotes = $this->atmRepository->getAll();
        $withdrawal = [];
        $remainingAmount = $amount;

        foreach ($atmNotes as $note) {
            if ($remainingAmount <= 0) break;

            $notesNeeded = intdiv($remainingAmount, $note->value);
            $notesToGive = min($notesNeeded, $note->count);

            if ($notesToGive > 0) {
                $withdrawal[$note->value] = $notesToGive;
                $remainingAmount -= $notesToGive * $note->value;

                $this->atmRepository->updateCount($note->id, $note->count - $notesToGive);
            }
        }

        if ($remainingAmount > 0) {
            throw new \Exception("ATM does not have enough suitable banknotes to fulfill this request.");
        }

        return $withdrawal;
    }

}
