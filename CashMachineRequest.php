<?php

/**
 * Created by PhpStorm.
 * User: amiralijiwani
 * Date: 12/06/2016
 * Time: 11:42 PM
 */

class CashMachineRequest
{
    public $amount;
    public $noteItems;

    public function __construct()
    {
        $this->amount = 0;
        $this->noteItems = [];
    }

    public function isAmountConsumed()
    {
        $totalConsumed = array_sum($this->noteItems);
        return (($this->amount - $totalConsumed) === 0) ? true : false;
    }
}