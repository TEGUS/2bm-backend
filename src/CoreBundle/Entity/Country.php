<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ExclusionPolicy("all")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\CountryRepository")
 */
class Country
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Expose
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Town", mappedBy="country")
     * @Expose
     */
    private $towns;


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
     * Set name
     *
     * @param string $name
     *
     * @return Country
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
     * Constructor
     */
    public function __construct()
    {
        $this->towns = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add town
     *
     * @param \CoreBundle\Entity\Town $town
     *
     * @return Country
     */
    public function addTown(\CoreBundle\Entity\Town $town)
    {
        $this->towns[] = $town;

        return $this;
    }

    /**
     * Remove town
     *
     * @param \CoreBundle\Entity\Town $town
     */
    public function removeTown(\CoreBundle\Entity\Town $town)
    {
        $this->towns->removeElement($town);
    }

    /**
     * Get towns
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTowns()
    {
        return $this->towns;
    }
}
