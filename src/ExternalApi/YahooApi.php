<?php


namespace App\ExternalApi;

use App\Model\Weather;

class YahooApi extends AbstractWeather implements WeatherApiInterface
{

    public const PROVIDER_NAME = 'Yahoo';

    /**
     * @param \DateTime $day
     * @return Weather
     */
    public function getDay(\DateTime $day): Weather
    {
        $today = parent::getDay($day);
        $today->setProviderName(self::PROVIDER_NAME);

        return $today;
    }

}