<?php


namespace App\ExternalApi;

use App\Model\Weather;


interface WeatherApiInterface
{
    public function getDay(\DateTime $day): Weather;
}