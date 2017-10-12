<?php
namespace SoccerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SoccerBundle\Repository\PlayerRepository;
use Symfony\Component\HttpFoundation\Response;
use SoccerBundle\Entity\Player;
use SoccerBundle\Entity\Review;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DetailController extends Controller
{
    /**
     * @Route("/player/{playerId}", name="player_detail")
     */
    public function detailAction(int $playerId, Request $request)
    {
      $playerRepository = $this->getDoctrine()->getRepository(Player::class);
      $player = $playerRepository->find($playerId);

      $user = $this->getUser();
     if ($user) {
         $reviewForm = $this->getReviewForm();

         $reviewForm->handleRequest($request);
         if ($reviewForm->isSubmitted() && $reviewForm->isValid()) {
             $review = $reviewForm->getData();

             $review->setUser($this->getUser());
             $review->setPlayer($player);
             $em = $this->getDoctrine()->getManager();
             $em->persist($review);
             $em->flush();
             return $this->redirectToRoute('player_detail', [
                 'playerId' => $playerId,
             ]);
         }
       }
            return $this->render('SoccerBundle:Default:player.html.twig', [
                  'player' => $player,
                  'review_form' => $user ? $reviewForm->createView() : null,
              ]);
        }

        private function getReviewForm()
            {
                $review = new Review();
                $form = $this->createFormBuilder($review)
                    ->add('rating', IntegerType::class, ['label' => "Note sur 5"])
                    ->add('save', SubmitType::class, array('label' => "Noter l'équipe"))
                    ->getForm()
                ;

                return $form;
            }


}
