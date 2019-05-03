<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;
use App\AgeCalculator\AgeCalculatorManager;
use App\Model\AgeCalculator;

class AgeCalculatorController extends AbstractController
{

    public function index(AgeCalculatorManager $calculatorManager)
    {
        $bday = new DateTime('2004-04-11');

        $calculatorManager->ageCounter($bday, 'Adult');

        $count = $calculatorManager->myAge->getAge();
        $type = $calculatorManager->type->getType();

        var_dump($count, $type);

        return $this->render('age_calculator/index.html.twig', [
            'controller_name' => 'AgeCalculatorController'
        ]);
    }
}
