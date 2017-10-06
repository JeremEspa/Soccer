<?php
namespace SoccerBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SoccerBundle\Repository\ListplayersRepository;
use SoccerBundle\Entity\Listplayers;
use SoccerBundle\Entity\players;

class ListPlayerController extends Controller
{
    /**
     * @Route("/", name="listplayer_list")
     */
     public function listAction()
     {


         $playerRepository = $this->getDoctrine()->getRepository(players::class);
         $players = $playerRepository->findAll();

         return $this->render('SoccerBundle:Default:index.html.twig', [

             'players' => $players,
         ]);
     }
 }