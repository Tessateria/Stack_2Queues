<?php
require_once ('Queue.php');

class Stack
{
    private $queues;
    private $currentQueue = 0;
    private $count = 0;
    private $maxSize = 1000;

    public function __construct()
    {
        $this->queues = [new Queue(), new Queue()];
    }

    public function push($element)
    {
        if ($this->count >= $this->maxSize) {
            echo 'Stack is full.' . PHP_EOL;
            return;
        }
        $this->queues[$this->currentQueue]->in($element);
        $this->count++;
    }

    public function pop()
    {
        if ($this->count <= 0) {
            echo 'Queue is empty.' . PHP_EOL;
            return;
        }

        if ($this->currentQueue == 0) {
            $returnElement = $this->getElement(0, 1);
            $this->currentQueue = 1;
        } else {
            $returnElement = $this->getElement(1, 0);
            $this->currentQueue = 0;
        }

        $this->count--;
        return $returnElement;
    }

    private function getElement($queueIndex1, $queueIndex2)
    {
        for ($i = 0; $i < ($this->count-1); $i++) {
            $this->queues[$queueIndex2]->in($this->queues[$queueIndex1]->out());
        }

        return $this->queues[$queueIndex1]->out();
    }

    public function isEmpty()
    {
        return $this->count == 0;
    }
}
