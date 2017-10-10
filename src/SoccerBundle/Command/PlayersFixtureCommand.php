<?php

namespace SoccerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use SoccerBundle\Entity\Player;
use SoccerBundle\Entity\User;
use SoccerBundle\Entity\Review;


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

      $player = new Player();
      $player->setFirstname("Alexandre");
      $player->setLastname("Lacazette");
      $player->setTeam("Arsenal");
      $player->setPosition("Attaquant");
      $player->setImage("image");


      $em = $this->getContainer()->get('doctrine.orm.entity_manager');

      //Met dans une file d'attente
      $em->persist($player);

      //Insère les objets persistés dans la base de donnée
      $em->flush();

      $this->importUsers($output);
      $this->importReviews($output);

      $output->writeln('<info>OK !</info>');
    }

    private function importUsers($output)
     {
         $em = $this->getContainer()->get('doctrine.orm.entity_manager');
         $passwordEncoder = $this->getContainer()->get('security.password_encoder');
         $user = new User();
         $user->setEmail('jeremie.esparel@ynov.com');
         $user->setPassword($passwordEncoder->encodePassword($user,'123'));
         $user->setRoles(['ROLE_ADMIN']);
         $em->persist($user);
         $user = new User();
         $user->setEmail('jeremie.espa@gmail.com');
         $user->setPassword($passwordEncoder->encodePassword($user,'123'));
         $user->setRoles(['ROLE_USER']);
         $em->persist($user);
         $em->flush();
         $output->writeln('<info>Import users OK !</info>');
     }

     private function importReviews($output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $doctrine = $this->getContainer()->get('doctrine');
        $users = $doctrine->getRepository(User::class)->findAll();


        foreach ($users as $user) {
                $review = new Review();
                $review->setUser($user);
                $review->setRating(mt_rand(0, 5));

                $em->persist($review);
            }

        $em->flush();
        $output->writeln('<info>Import reviews OK !</info>');
    }

}
