<?php

namespace SoccerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use SoccerBundle\Entity\players;
use SoccerBundle\Entity\Listplayers;

class PlayersFixtureCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('players:fixture')
            ->setDescription('...')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

      $players = new players();
      $players->setFirstname("firstname");
      $players->setLastname("lastname");
      $players->setTeam("team");
      $players->setPosition("position");
      $players->setImage("image");
      $players->setRate("rate");


      $em = $this->getContainer()->get('doctrine.orm.entity_manager');

      //Met dans une file d'attente
      $em->persist($players);

      //Insère les objets persistés dans la base de donnée
      $em->flush();

      $output->writeln('<info>OK !</info>');

    }

}
