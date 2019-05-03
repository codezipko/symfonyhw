<?php


namespace App\AgeCalculator;


class AgeType
{
    public $type = [
        0   => 'children',
        1   => 'adult'
    ];

    public function getType()
    {
        return $this->type;
    }

    public function setType($ageType = null) {
        return $this->type = $ageType;
    }

    public function checkType($age, $myType = null)
    {

        if(empty($myType)) {

            $type = $this->type[1];

            if ($age < 18) {
                $type = $this->type[0];
            }

        } else {
            $type = $this->checkUserArgument($age, $myType);
        }

        return $this->setType($type);
    }

    public function checkUserArgument($age, $myType) {

        if(!empty($myType)) {
            $type = $this->type[1];
            if($myType == 'adult' && $age < 18) {
                $type = $this->type[0];
            }
        }

        return $type;
    }
}