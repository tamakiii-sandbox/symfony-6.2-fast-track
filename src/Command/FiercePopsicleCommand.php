<?php

namespace App\Command;

use App\Entity\DeliciousPopsicle;
use App\Repository\DeliciousPopsicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:fierce-popsicle',
    description: 'Add a short description for your command',
)]
class FiercePopsicleCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        // $this
        //     ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
        //     ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        // ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $repository = $this->entityManager->getRepository(DeliciousPopsicle::class);
        $entity = $repository->find(1);

        if ($entity instanceof DeliciousPopsicle) {
            $amount = $entity->getAmount();
            $io->success(sprintf('type: %s', gettype($amount)));
            $io->success(sprintf('amount: %f', $amount));
        } else {
            $io->error(sprintf('failed to load: %s', DeliciousPopsicle::class));
        }

        return Command::SUCCESS;
    }
}
