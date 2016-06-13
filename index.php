<?php
/**
 * Created by PhpStorm.
 * User: amiralijiwani
 * Date: 13/06/2016
 * Time: 12:11 AM
 */

require_once ('vendor/autoload.php');

$cashMachine = new \AppCode\Client\CashMachine();

$r1 = new \AppCode\InputOutput\CashMachineRequest(30);
$r2 = new \AppCode\InputOutput\CashMachineRequest(80);
$r3 = new \AppCode\InputOutput\CashMachineRequest(125);
$r4 = new \AppCode\InputOutput\CashMachineRequest(-130);
$r5 = new \AppCode\InputOutput\CashMachineRequest(NULL);

echo "Entry: " . $r1->GetAmount();
echo "Result: " . print_r($cashMachine->WithdrawCash($r1));

echo "Entry: " . $r2->GetAmount();
echo "Result: " . print_r($cashMachine->WithdrawCash($r2));

try
{
    echo "Entry: " . $r3->GetAmount();
    $cashMachine->WithdrawCash($r3);
}
catch (Exception $e)
{
    echo "Result: throw " . get_class($e);
}

try
{
    echo "Entry: " . $r4->GetAmount();
    $cashMachine->WithdrawCash($r4);
}
catch (Exception $e)
{
    echo "Result: throw " . get_class($e);
}

echo "Entry: NULL";
echo "Result: " . print_r($cashMachine->WithdrawCash($r5));