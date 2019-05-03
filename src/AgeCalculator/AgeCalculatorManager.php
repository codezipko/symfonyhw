<?php


namespace App\AgeCalculator;

use DateTime;
use App\Model\AgeCalculator;
use App\AgeCalculator\AgeType;

class AgeCalculatorManager
{
    /**
     * @var AgeCalculator
     */
    public $myAge;

    public $type;


    /**
     * AgeCalculatorManager constructor.
     * @param AgeCalculator $ageCalculator\
     */
    public function __construct(AgeCalculator $ageCalculator, AgeType $ageType)
    {
        $this->myAge = $ageCalculator;
        $this->type = $ageType;
    }

    /**
     * @param $bday
     * @return mixed
     * @throws \Exception
     */
    public function ageCounter($bday, $myType = null)
    {
        $now = new DateTime();

        $results = $now->diff($bday);

        $this->type->checkType($results->y, strtolower($myType));

        return $this->myAge->setAge($results->y);
    }
}