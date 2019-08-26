<?php
/**
 * Created by PhpStorm.
 * User: lichengxiu
 * Date: 2019-08-26
 * Time: 14:37
 */

class Cashier
{
    private $buyer_name;
    private $stuffs;
    private $total_price;

    public function __construct($buyer_name, $stuffs)
    {
        $this->buyer_name = $buyer_name;
        $this->stuffs = $stuffs;
    }

    public function checkout()
    {
        echo 'checkout ' . $this->buyer_name . PHP_EOL;
        $this->countMoney();
        $this->printReceipt();
    }

    private function countMoney()
    {
        // 計算結帳金額

        try {
            $price = random_int(1, 100);
        }
        catch (Exception $err) {
            $price = 20;
        }
        finally {
            $this->total_price = $price;
        }
    }

    public function getTotal()
    {
        return $this->total_price;
    }

    private function printReceipt()
    {
        array_walk($this->stuffs, function ($value) {
            echo $this->buyer_name . ' buy     ' . $value . PHP_EOL;
            sleep(1);
        });
    }
}