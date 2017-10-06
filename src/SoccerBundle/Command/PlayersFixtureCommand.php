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
      $players->setFirstname["Alexandre"];
      $players->setLastname("Lacazette");
      $players->setTeam("Arsonal");
      $players->setPosition("Attaquant");
      $players->setImage("image");
      $players->setRate("");

      $em = $this->getContainer()->get('doctrine.orm.entity_manager');

      //Met dans une file d'attente
      $em->persist($players);

      //Insère les objets persistés dans la base de donnée
      $em->flush();

      $listplayers = new Listplayers();
             $listplayers->setName('Notation des projets des élèves');
             $listplayers->setGithubRepository('https://github.com/tentacode/students-review');
             $listplayers->setPlayersIds([1]);

             $em->persist($team);
             $em->flush();

        $output->writeln('Jérémie a une petite Bite');
    }

}
