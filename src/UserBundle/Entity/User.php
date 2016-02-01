<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Car
     *
     * @ORM\OneToOne(targetEntity="RentAndDriveBundle\Entity\Car", mappedBy="user")
     * @ORM\Column(nullable=true)
     */
    protected $car;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="RentAndDriveBundle\Entity\Rent", mappedBy="user")
     *
     */
    private $rents;

    /**
     * @var integer
     *
     * @ORM\Column(name="requested_car_id", type="integer", nullable=true)
     */
    protected $requestedCarId;

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
     * Get car
     *
     * @return Car
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set car
     *
     */
    public function setCar($car)
    {
        $this->car = $car;
    }

    /**
     * Get car
     *
     * @return integer
     */
    public function getRequestedCarId()
    {
        return $this->requestedCarId;
    }

    /**
     * Set requestedCarId
     *
     */
    public function setRequestedCarID($car_id)
    {
        $this->requestedCarId = $car_id;
    }


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
