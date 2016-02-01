<?php

namespace RentAndDriveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Rent
 *
 * @ORM\Table(name="rent")
 * @ORM\Entity
 */
class Rent
{
    /**
     * @var Car
     *
     * @ORM\ManyToOne(targetEntity="Car", inversedBy="rents")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     */
    private $car;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="rents")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var \Date
     *
     * @ORM\Column(name="starting_time", type="date")
     */
    private $startingTime;

    /**
     * @var \Date
     *
     * @ORM\Column(name="ending_time", type="date")
     */
    private $endingTime;

    /**
     * @var \Date
     *
     * @ORM\Column(name="rent_request_date", type="date", nullable=true)
     */
    private $rentRequestDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="rent_price", type="integer", nullable=true)
     */
    private $rentPrice;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set car
     *
     * @param \RentAndDriveBundle\Entity\Car $car
     * @return Rent
     */
    public function setCar(\RentAndDriveBundle\Entity\Car $car = null)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return \RentAndDriveBundle\Entity\Car
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     * @return Rent
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }    

    /**
     * Set startingTime
     *
     * @param \Date $startingTime
     * @return Rent
     */
    public function setStartingTime($startingTime)
    {
        $this->startingTime = $startingTime;

        return $this;
    }

    /**
     * Get startingTime
     *
     * @return \Date
     */
    public function getStartingTime()
    {
        return $this->startingTime;
    }

    /**
     * Set endingTime
     *
     * @param \Date $endingTime
     * @return Rent
     */
    public function setEndingTime($endingTime)
    {
        $this->endingTime = $endingTime;

        return $this;
    }

    /**
     * Get endingTime
     *
     * @return \Date
     */
    public function getEndingTime()
    {
        return $this->endingTime;
    }

    /**
     * Set rentPrice
     *
     * @param integer
     * @return Rent
     */
    public function setRentPrice($rentPrice)
    {
        $this->rentPrice = $rentPrice;

        return $this;
    }

    /**
     * Get rentPrice
     *
     * @return integer
     */
    public function getRentPrice()
    {
        return $this->rentPrice;
    }

    /**
     * Set rentRequestDate
     *
     * @param \Date $rentRequestDate
     * @return Rent
     */
    public function setRentRequestDate($rentRequestDate)
    {
        $this->rentRequestDate = $rentRequestDate;

        return $this;
    }

    /**
     * @return \Date
     *
     */
     public function getRentRequestDate()
     {
           return $this->rentRequestDate;
     }

     /**
      * Set active
      *
      * @param boolean
      * @return Rent
      */
     public function setActive($active)
     {
         $this->active = $active;

         return $this;
     }

     /**
      * Get active
      *
      * @return boolean
      */
     public function getActive()
     {
         return $this->active;
     }
}
