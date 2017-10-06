<?php
namespace SoccerBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SoccerBundle\Repository\ListplayersRepository;

class AddPlayerController extends Controller
{
    /**
     * @Route("/create/{firstname}/{lastname}/{team}/{position}/{image}/{rate}", name="players_create")
     */
    public function createAction($firstname, $lastname, $team, $position, $image, $rate)
    {
        $players = new Player();
        $players->setFirstname($firstname);
        $players->setLastname($lastname);
        $players->setTeam($team);
        $players->setPosition($position);
        $players->setImage($image);
        $players->setRate($rate);

        $em = $this->getDoctrine()->getManager();

        //Met dans une file d'attente
        $em->persist($players);

        //Insère les objets persistés dans la base de donnée
        $em->flush();

        die('Ok');
    }
}
