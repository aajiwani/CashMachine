<?php

/**
 * Created by PhpStorm.
 * User: amiralijiwani
 * Date: 12/06/2016
 * Time: 11:44 PM
 */

abstract class AbstractNoteBox implements INoteBox
{
    protected $nextNoteBox;
    private $noteAmount;

    public function __construct()
    {
        $this->nextNoteBox = NULL;
        $this->noteAmount = $this->getNoteAmount();
    }

    abstract protected function getNoteAmount();

    public function handleRequest(CashMachineRequest &$request)
    {
        while ($request->amount > $this->noteAmount)
        {
            $request->noteItems[] = $this->noteAmount;
        }

        if ($this->nextNoteBox !== NULL)
        {
            $this->nextNoteBox->handleRequest($request);
        }
    }

    public function setNextNoteBox($noteBox)
    {
        $this->nextNoteBox = $noteBox;
    }
}