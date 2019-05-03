<?php

namespace App\Command;

use DateTime;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\AgeCalculator\AgeCalculatorManager;

class AgeCalculatorCommand extends Command
{
    protected static $defaultName = 'app:age:calculator';

    private $ageManager;

    public function __construct(AgeCalculatorManager $ageManager)
    {
        $this->ageManager = $ageManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->addArgument(
                'birthday',
                InputArgument::REQUIRED,
                'Enter your birthday.'
            )
            ->addOption(
                'adult',
                null,
                InputOption::VALUE_NONE,
                'If set, the task will yell in uppercase letters'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $bday = new DateTime($input->getArgument('birthday'));
//        $ageType = $input->getArgument('ageType');

        $count = $this->ageManager->ageCounter($bday);

        $displayAge = $this->ageManager->myAge->getAge();
        $displayType = $this->ageManager->type->getType();

        $io->note('I am ' . $displayAge . ' years old.');

        if ($input->getOption('adult')) {
            if($displayType == 'children') {
                $io->warning('Am I an adult ? ---- No !!!');
            } else {
                $io->success('Am I an adult ? ---- Yes !!');
            }
        }
    }

}
