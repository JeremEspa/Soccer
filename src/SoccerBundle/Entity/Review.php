<?php

namespace SoccerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Review
 *
 * @ORM\Table(name="review")
 * @ORM\Entity(repositoryClass="SoccerBundle\Repository\ReviewRepository")
 */
class Review
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
   * @var int
   *
   * @ORM\Column(name="rating", type="integer")
   */
  private $rating;

  /**
   * @var User
   *
   * @ORM\ManyToOne(targetEntity="SoccerBundle\Entity\User", inversedBy="reviews")
   * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
   */
  private $user;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     *
     * @return Review
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
        return $this;
    }
    /**
     * Get rating
     *
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
    * Set user
    *
    * @param User $user
    *
    * @return Review
    */
   public function setUser($user)
   {
       $this->user = $user;
       return $this;
   }
   /**
    * Get user
    *
    * @return User
    */
   public function getUser()
   {
       return $this->user;
   }


}
