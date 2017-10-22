<?php
namespace SoccerBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use SoccerBundle\Repository\PlayerRepository;
use SoccerBundle\Entity\Player;
class ListPlayerController extends Controller
{
    /**
     * @Route("/", name="listplayer_list")
     */
     public function listAction(Request $request)
     {
        $search = $request->query->get('search');

         $playerRepository = $this->getDoctrine()->getRepository(Player::class);


         if($search === NULL)
         {
            $players = $playerRepository->findAll();
         }
         else
         {
           $query = $playerRepository->createQueryBuilder('p')
           ->where('p.firstname LIKE :search')
           ->orWhere('p.lastname LIKE :search')
           ->orWhere('p.team LIKE :search')
           ->orWhere('p.position LIKE :search')
           ->setParameter('search', $search)
           ->orderBy('p.firstname', 'ASC')
           ->getQuery()
           ;
           $players = $query->getResult();
         }


         return $this->render('SoccerBundle:Default:index.html.twig', [
             'players' => $players,
         ]);
     }
 }
