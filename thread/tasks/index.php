<?php
/**
 * Created by PhpStorm.
 * User: lichengxiu
 * Date: 2019-03-24
 * Time: 19:39
 */

include_once 'Task1.php';
include_once 'Task2.php';

echo '>>> Main Start' . PHP_EOL;

$task1 = new Task1(1);
$task2 = new Task2(20);
$task1->start();
$task2->start();

echo '>>> Main End' . PHP_EOL;