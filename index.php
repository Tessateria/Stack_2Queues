<?php
require_once ('Stack.php');

$array = new Stack();

$array ->push(5);
$array ->push(1);
$array ->push(8);

echo $array ->pop() . PHP_EOL;
echo $array ->pop() . PHP_EOL;
echo $array ->pop() . PHP_EOL;


