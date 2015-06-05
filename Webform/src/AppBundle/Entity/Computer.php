<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Computer
 */
class Computer
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $cpu;

    /**
     * @var float
     */
    private $frequency;

    /**
     * @var integer
     */
    private $harddisk;


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
     * @return Computer
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
     * Set cpu
     *
     * @param string $cpu
     * @return Computer
     */
    public function setCpu($cpu)
    {
        $this->cpu = $cpu;

        return $this;
    }

    /**
     * Get cpu
     *
     * @return string 
     */
    public function getCpu()
    {
        return $this->cpu;
    }

    /**
     * Set frequency
     *
     * @param float $frequency
     * @return Computer
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * Get frequency
     *
     * @return float 
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set harddisk
     *
     * @param integer $harddisk
     * @return Computer
     */
    public function setHarddisk($harddisk)
    {
        $this->harddisk = $harddisk;

        return $this;
    }

    /**
     * Get harddisk
     *
     * @return integer 
     */
    public function getHarddisk()
    {
        return $this->harddisk;
    }

    public function __toString()
    {
        return $this->getName() . '_' . $this->getCpu() . '_' . $this->getFrequency() . '_' . $this->getHarddisk();
    }
}
