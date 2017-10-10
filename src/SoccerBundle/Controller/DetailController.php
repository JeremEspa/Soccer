<?php
namespace SoccerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SoccerBundle\Repository\PlayerRepository;
use Symfony\Component\HttpFoundation\Response;
use SoccerBundle\Entity\Player;


class DetailController extends Controller
{
    /**
     * @Route("/player/{playerId}", name="player_detail")
     */
    public function detailAction($playerId)
    {
      $playerRepository = $this->getDoctrine()->getRepository(Player::class);
      $player = $playerRepository->find($playerId);

      return $this->render('SoccerBundle:Default:player.html.twig', [
            'player' => $player,
        ]);

    }
}
