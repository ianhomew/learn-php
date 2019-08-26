<?php
/**
 * Created by PhpStorm.
 * User: lichengxiu
 * Date: 2019-08-25
 * Time: 16:46
 */

class Task1 extends Thread
{
    private $min;
    private $max;

    /**
     * Task1 constructor.
     *
     * @param int $min
     */
    public function __construct(int $min)
    {
        $this->min = $min;
        $this->max = $min + 10;
    }

    public function run()
    {
        $this->loop();
    }

    private function loop()
    {
        for ($i = $this->min; $i < $this->max; $i++) {
            echo __CLASS__ . '_____' . $i . PHP_EOL;
            sleep(1);
        }
    }
}
