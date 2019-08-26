<?php
/**
 * Created by PhpStorm.
 * User: lichengxiu
 * Date: 2019-08-26
 * Time: 14:06
 */

// 假設有兩個 Buyer, 一個 Cashier

//$version = phpversion("pthreads"); // 3.1.5
//echo $version;
//exit;

include_once 'Buyer.php';

echo '>>> Main Start' . PHP_EOL;

/** @var Buyer[] $threads */
$buyers = [];
/** @var int $total 計算 Buyers 買了多少金額 */
$total = 0;

$buyer1_stuffs = [ 'apple', 'orange', 'toyA', 'oil' ];
$buyer2_stuffs = [ 'apply pie', 'pen', 'video' ];
$buyer3_stuffs = [ 'water', 'pillow', 'cell phone', 'table' ];

$buyers[] = new Buyer('buyer1', $buyer1_stuffs);
$buyers[] = new Buyer('buyer2', $buyer2_stuffs);
$buyers[] = new Buyer('buyer3', $buyer3_stuffs);

foreach ($buyers as $buyer) {
    $buyer->start();
}

foreach ($buyers as $buyer) {
    $buyer->join(); // 表示主程序需要等待線程執行完畢
    $total += $buyer->totalPrice();
    echo '$' . $buyer->totalPrice() . PHP_EOL;
}

echo 'Three buyers total spend $' . $total . PHP_EOL;

echo '>>> Main End' . PHP_EOL;
