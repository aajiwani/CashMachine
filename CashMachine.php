<?php

/**
 * Created by PhpStorm.
 * User: amiralijiwani
 * Date: 12/06/2016
 * Time: 11:39 PM
 */

class CashMachine
{
    private $noteDeductionChain;

    public function __construct()
    {
        $hundredNoteBox = new HundredNoteBox();
        $fiftyNoteBox = new FiftyNoteBox();
        $twentyNoteBox = new TwentyNoteBox();
        $tenNoteBox = new TenNoteBox();

        $twentyNoteBox->setNextNoteBox($tenNoteBox);
        $fiftyNoteBox->setNextNoteBox($twentyNoteBox);
        $hundredNoteBox->setNextNoteBox($fiftyNoteBox);

        $this->noteDeductionChain = $hundredNoteBox;
    }

    public function WithdrawCash($cashAmount)
    {
        $typedAmount = intval($cashAmount);
        if ($typedAmount < 0)
        {
            throw new InvalidArgumentException("Amount must be greater than zero");
        }
        else
        {
            $request = new CashMachineRequest();
            $request->amount = $typedAmount;
            $this->noteDeductionChain->handleRequest($request);

            if ($request->isAmountConsumed())
            {
                return $request->noteItems;
            }
            else
            {
                throw new NoteUnavailableException("The notes required for the amount to be consumed is not available");
            }
        }
    }
}