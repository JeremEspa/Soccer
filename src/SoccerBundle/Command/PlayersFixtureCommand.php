<?php

namespace SoccerBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
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

      $player = new Player();
      $player->setFirstname("Samuel");
      $player->setLastname("Umtiti");
      $player->setTeam("Barcelone");
      $player->setPosition("Defenseur");
      $player->setImage("image");


      $em = $this->getContainer()->get('doctrine.orm.entity_manager');

      //Met dans une file d'attente
      $em->persist($player);

      //Insère les objets persistés dans la base de donnée
      $em->flush();

      $player = new Player();
      $player->setFirstname("Nabil");
      $player->setLastname("Fekir");
      $player->setTeam("OL");
      $player->setPosition("Attaquant");
      $player->setImage("image");


      $em = $this->getContainer()->get('doctrine.orm.entity_manager');

      //Met dans une file d'attente
      $em->persist($player);

      //Insère les objets persistés dans la base de donnée
      $em->flush();

      $player = new Player();
      $player->setFirstname("Leo");
      $player->setLastname("Messi");
      $player->setTeam("Barcelone");
      $player->setPosition("Attaquant");
      $player->setImage("image");


      $em = $this->getContainer()->get('doctrine.orm.entity_manager');

      //Met dans une file d'attente
      $em->persist($player);

      //Insère les objets persistés dans la base de donnée
      $em->flush();

      $player = new Player();
      $player->setFirstname("Cristiano");
      $player->setLastname("Ronaldo");
      $player->setTeam("Real Madrid");
      $player->setPosition("Attaquant");
      $player->setImage("image");


      $em = $this->getContainer()->get('doctrine.orm.entity_manager');

      //Met dans une file d'attente
      $em->persist($player);

      //Insère les objets persistés dans la base de donnée
      $em->flush();

      $player = new Player();
      $player->setFirstname("Sergio");
      $player->setLastname("Ramos");
      $player->setTeam("Real Madrid");
      $player->setPosition("Defenseur");
      $player->setImage("image");


      $em = $this->getContainer()->get('doctrine.orm.entity_manager');

      //Met dans une file d'attente
      $em->persist($player);

      //Insère les objets persistés dans la base de donnée
      $em->flush();

      $player = new Player();
      $player->setFirstname("Alexis");
      $player->setLastname("Sanchez");
      $player->setTeam("Arsenal");
      $player->setPosition("Attaquant");
      $player->setImage("image");


      $em = $this->getContainer()->get('doctrine.orm.entity_manager');

      //Met dans une file d'attente
      $em->persist($player);

      //Insère les objets persistés dans la base de donnée
      $em->flush();

      $player = new Player();
      $player->setFirstname("");
      $player->setLastname("Neymar");
      $player->setTeam("Paris SG");
      $player->setPosition("Attaquant");
      $player->setImage("image");


      $em = $this->getContainer()->get('doctrine.orm.entity_manager');

      //Met dans une file d'attente
      $em->persist($player);

      //Insère les objets persistés dans la base de donnée
      $em->flush();

      $player = new Player();
      $player->setFirstname("Paul");
      $player->setLastname("Pogba");
      $player->setTeam("Manchester United");
      $player->setPosition("Milieu");
      $player->setImage("image");


      $em = $this->getContainer()->get('doctrine.orm.entity_manager');

      //Met dans une file d'attente
      $em->persist($player);

      //Insère les objets persistés dans la base de donnée
      $em->flush();

      $player = new Player();
      $player->setFirstname("");
      $player->setLastname("Isco");
      $player->setTeam("Real Madrid");
      $player->setPosition("Milieu");
      $player->setImage("image");


      $em = $this->getContainer()->get('doctrine.orm.entity_manager');

      //Met dans une file d'attente
      $em->persist($player);

      //Insère les objets persistés dans la base de donnée
      $em->flush();

      $player = new Player();
      $player->setFirstname("Juan");
      $player->setLastname("Mata");
      $player->setTeam("Manchester United");
      $player->setPosition("Milieu");
      $player->setImage("image");


      $em = $this->getContainer()->get('doctrine.orm.entity_manager');

      //Met dans une file d'attente
      $em->persist($player);

      //Insère les objets persistés dans la base de donnée
      $em->flush();

      $player = new Player();
      $player->setFirstname("Kylian");
      $player->setLastname("Mbappé");
      $player->setTeam("Paris SG");
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
         $user->setNickname('Espa');
         $user->setPassword($passwordEncoder->encodePassword($user,'123'));
         $user->setRoles(['ROLE_ADMIN']);
         $em->persist($user);
         $user = new User();
         $user->setEmail('jeremie.espa@gmail.com');
         $user->setNickname('Jerem');
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
        $players = $doctrine->getRepository(Player::class)->findAll();


        foreach ($users as $user) {
          foreach ($players as $player){
                $review = new Review();
                $review->setUser($user);
                $review->setPlayer($player);
                $review->setRating(mt_rand(1, 10));

                $em->persist($review);
            }
          }

        $em->flush();
        $output->writeln('<info>Import reviews OK !</info>');
    }

}
