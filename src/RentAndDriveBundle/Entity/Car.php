<?php

namespace RentAndDriveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollections;

/**
 * Car
 *
 * @ORM\Table(name="cars")
 * @ORM\Entity
 */
class Car
{
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Rent", mappedBy="car")
     *
     */
    private $rents;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="CarImage", mappedBy="car")
     *
     */
    private $carImages;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @ORM\Column(nullable=true)
     **/
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="seats", type="integer")
     */
    private $seats;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean", options={"default" = true}, nullable=true)
     */
    private $available;

    public function __contruct()
    {
        $this -> carImages = new ArrayCollection();
    }


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
     * Set name
     *
     * @param string $name
     * @return Car
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set seats
     *
     * @param integer $seats
     * @return Car
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

    /**
     * Get seats
     *
     * @return integer
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Car
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * Set available
     *
     * @param boolean $available
     * @return Car
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get isAvailable
     *
     * @return boolean
     */
    public function isAvailable()
    {
        return $this->available;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->carImages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add carImages
     *
     * @param \RentAndDriveBundle\Entity\CarImage $carImages
     * @return Car
     */
    public function addCarImage(\RentAndDriveBundle\Entity\CarImage $carImages)
    {
        $this->carImages[] = $carImages;

        return $this;
    }

    /**
     * Remove carImages
     *
     * @param \RentAndDriveBundle\Entity\CarImage $carImages
     */
    public function removeCarImage(\RentAndDriveBundle\Entity\CarImage $carImages)
    {
        $this->carImages->removeElement($carImages);
    }

    /**
     * Get carImages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCarImages()
    {
        return $this->carImages;
    }


    /**
     * Render a Car as a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Set user
     *
     * @param string $user
     * @return Car
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get available
     *
     * @return boolean
     */
    public function getAvailable()
    {
        return $this->available;
    }
}
