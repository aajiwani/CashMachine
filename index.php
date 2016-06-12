<?php
/**
 * Created by PhpStorm.
 * User: amiralijiwani
 * Date: 13/06/2016
 * Time: 12:11 AM
 */

require_once ('vendor/autoload.php');

$cashMachine = new CashMachine();

echo "Entry: 30";
echo "Result: " . print_r($cashMachine->WithdrawCash(30));

echo "Entry: 80";
echo "Result: " . print_r($cashMachine->WithdrawCash(80));

try
{
    echo "Entry: 125";
    $cashMachine->WithdrawCash(125);
}
catch (Exception $e)
{
    echo "Result: throw NoteUnavailableException";
}

try
{
    echo "Entry: -130";
    $cashMachine->WithdrawCash(-130);
}
catch (Exception $e)
{
    echo "Result: throw NoteUnavailableException";
}

try
{
    echo "Entry: -130";
    $cashMachine->WithdrawCash(-130);
}
catch (Exception $e)
{
    echo "Result: throw NoteUnavailableException";
}

echo "Entry: NULL";
echo "Result: " . print_r($cashMachine->WithdrawCash(NULL));