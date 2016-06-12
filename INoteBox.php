<?php

/**
 * Created by PhpStorm.
 * User: amiralijiwani
 * Date: 12/06/2016
 * Time: 11:41 PM
 */

interface INoteBox
{
    public function handleRequest(CashMachineRequest &$request);
    public function setNextNoteBox($noteBox);
}