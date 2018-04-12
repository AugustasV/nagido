<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18.4.10
 * Time: 19.02
 */

namespace App\Model;


class NullWeather extends  Weather
{

    /**
     * NullWeather constructor.
     */
    public function __construct()
    {
        $this->setDayTemp(5);
        $this->setNightTemp(-1);
        $this->setSky(1);
        $this->setDate(new \DateTime('1970-01-01'));
    }
}