<?php

namespace Usr\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usr\UserBundle\Entity\User.
 *
 * @ORM\Table(name="users")
 * @ORM\HasLifecycleCallbacks
 * @ORM\InheritanceType("JOINED")
 * @ORM\Entity(repositoryClass="Usr\UserBundle\Repository\UserRepository")
 * @UniqueEntity(fields = "username", targetClass = "Rocket\UserBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "Rocket\UserBundle\Entity\User", message="fos_user.email.already_used")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"supplier" = "Supplier", "buyer" = "Buyer", "user" = "User", "logistics" = "Logistics", "freelancer" = "Freelancer"})
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="first_name", type="text", nullable=true)
     */
    protected $firstName;

    /**
     * @ORM\Column(name="last_name", type="text", nullable=true)
     */
    protected $lastName;

    /**
     * @ORM\Column(name="address_1", type="string", length=100, nullable=true)
     */
    protected $streetAddress;

    /**
     * @ORM\Column(name="address_2", type="string", length=100, nullable=true)
     */
    protected $address2;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $state;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $zipCode;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    protected $country;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @param mixed $firstName
     *
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $lastName
     *
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $streetAddress
     *
     * @return $this
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @param mixed $address2
     *
     * @return $this
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param mixed $city
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $zipCode
     *
     * @return $this
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return \Usr\UserBundle\Entity\User
     */
    public function setName($name)
    {
        $spltName = explode(' ', $name);
        $this->firstName = (isset($spltName[0])) ? array_shift($spltName) : null;
        $this->lastName = (count($spltName) > 0) ? implode(' ', $spltName) : null;

        return $this;
    }

    public function getName()
    {
        return (isset($this->firstName) || isset($this->lastName)) ? "{$this->firstName}  {$this->lastName}" : '';
    }

    /**
     * Get fullname.
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}