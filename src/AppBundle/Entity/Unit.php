<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Domain\Unit\Enitity\UnitInterface;

/**
 * Unit
 *
 * @ORM\Table(name="unit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UnitRepository")
 */
class Unit implements UnitInterface
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="shortcut", type="string", length=3)
     */
    private $shortcut;

    /**
     * Unit constructor.
     *
     * @param string $name
     * @param string $shortcut
     */
    public function __construct($name, $shortcut)
    {
        $this->name = $name;
        $this->shortcut = $shortcut;
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
     * @return Unit
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
     * Set shortcut
     *
     * @param string $shortcut
     * @return Unit
     */
    public function setShortcut($shortcut)
    {
        $this->shortcut = $shortcut;

        return $this;
    }

    /**
     * Get shortcut
     *
     * @return string 
     */
    public function getShortcut()
    {
        return $this->shortcut;
    }

    /**
     * @param string $name
     * @param string $shortcut
     * @return void
     */
    public function compose($name, $shortcut)
    {
        $this->setName($name);
        $this->setShortcut($shortcut);
    }
}
