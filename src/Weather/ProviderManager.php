<?php


namespace App\Weather;


use App\ExternalApi\WeatherApiInterface;

class ProviderManager
{
    /**
     * @var WeatherApiInterface
     */
    private $weatherProvider;

    /**
     * @param \DateTime $day
     * @return WeatherApiInterface
     */
    public function getWeatherProvider(\DateTime $day): WeatherApiInterface
    {
        $weekDay = $day->format('D');

        if($weekDay === 'Sat' || $weekDay === 'Sun') {
            //todo:: return yahoo
            $provider = $this->getProviderService('yahoo');
        } else {
            $provider = $this->getProviderService('google');
        }

        return $provider;
    }

    /**
     * @param $providerServiceName
     * @return WeatherApiInterface
     */
    public function getProviderService($providerServiceName): WeatherApiInterface
    {
        if(!isset($this->weatherProvider[$providerServiceName])) {
            throw new \RuntimeException('Provider with name ' .$providerServiceName. ' this not exists');
        }

        return $this->weatherProvider[$providerServiceName];
    }

    /**
     * @param $providerName
     * @param WeatherApiInterface $weatherApiInterface
     */
    public function addWeatherProvider($providerName, WeatherApiInterface $weatherApiInterface)
    {
        $this->weatherProvider[$providerName] = $weatherApiInterface;
    }


}