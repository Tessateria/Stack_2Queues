<?php

class Queue
{
    private $head = 0;
    private $tail = 0;
    private $queue = [];
    private $maxSize = 1000;

    public function in($element)
    {
        if (($this->tail - $this->head) >= $this->maxSize) {
            echo 'Queue is full.';
            return;
        }

        $this->queue[$this->tail++] = $element;
    }

    public function out()
    {
        if ($this->isEmpty()) {
            echo 'Queue is empty.';
            return;
        }

        $returnElement = $this->queue[$this->head++];

        if ($this->isEmpty()) {
            $this->head = $this->tail = 0;
        }

        return $returnElement;
    }

    public function isEmpty(): bool
    {
        return $this->head >= $this->tail;
    }
}
