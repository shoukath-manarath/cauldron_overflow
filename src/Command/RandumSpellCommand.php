<?php

namespace App\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RandumSpellCommand extends Command
{
    protected static $defaultName = 'app:randum-spell';
    protected static $defaultDescription = 'Add a short description for your command';

    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct();

    }

    protected function configure(): void
    {
        $this
            ->addArgument('your-name', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('yell', null, InputOption::VALUE_NONE, 'Yell?')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $yourName = $input->getArgument('your-name');

        if ($yourName) {
            $io->note(sprintf('Hi %s', $yourName));
        }

        $names = [
            'shoukath',
            'zahid',
            'afsal'
        ];

        $name = $names[array_rand($names)];

        if ($input->getOption('yell')) {
            $name = strtoupper($name);
        }

        $this->logger->info('Casting spell '.$name);

        $io->success($name);

        return Command::SUCCESS;
    }
}
