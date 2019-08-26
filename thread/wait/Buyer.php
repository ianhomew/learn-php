<?php
/**
 * Created by PhpStorm.
 * User: lichengxiu
 * Date: 2019-08-26
 * Time: 14:07
 */

include_once 'Cashier.php';

class Buyer extends Thread
{
    private $buyer_name;
    private $stuffs;
    private $price;

    /**
     * The things you want to buy.
     * Buyer constructor.
     *
     * @param string $buyer_name
     * @param array $stuffs
     */
    public function __construct(string $buyer_name, array $stuffs)
    {
        $this->buyer_name = $buyer_name;
        $this->stuffs = $stuffs;
    }

    public function run()
    {
        $this->synchronized(function (Buyer $self) {
            echo $self->buyer_name . ' is waiting' . PHP_EOL;
            $self->wait();
        }, $this);

        $this->checkout();
    }

    public function totalPrice()
    {
        return $this->price;
    }

    private function checkout()
    {
        $cashier = new Cashier($this->buyer_name, $this->stuffs);
        $cashier->checkout();
        $this->price = $cashier->getTotal();
    }
}