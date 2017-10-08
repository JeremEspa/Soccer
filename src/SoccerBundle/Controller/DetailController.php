<?php
namespace SoccerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SoccerBundle\Repository\playersRepository;
use SoccerBundle\Repository\ListplayersRepository;
use Symfony\Component\HttpFoundation\Response;
use SoccerBundle\Entity\players;
use SoccerBundle\Entity\Listplayers;

class DetailController extends Controller
{
    /**
     * @Route("/player/{playerId}", name="player_detail")
     */
    public function detailAction($playerId)
    {
      $playerRepository = $this->getDoctrine()->getRepository(players::class);
      $player = $playerRepository->find($playerId);
      return $this->render('SoccerBundle:Default:player.html.twig', [
            'player' => $player,
        ]);

    }
}
