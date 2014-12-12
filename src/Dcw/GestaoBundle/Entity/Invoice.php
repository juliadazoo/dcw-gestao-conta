<?php

namespace Dcw\GestaoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 */
class Invoice
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $time;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \Dcw\GestaoBundle\Entity\Store
     */
    private $store;

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
     * Set value
     *
     * @param string $value
     * @return Invoice
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return Invoice
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set time
     *
     * @param string $time
     * @return Invoice
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Invoice
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set store
     *
     * @param \Dcw\GestaoBundle\Entity\Store $store
     * @return Invoice
     */
    public function setStore(\Dcw\GestaoBundle\Entity\Store $store = null)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Get store
     *
     * @return \Dcw\GestaoBundle\Entity\Store
     */
    public function getStore()
    {
        return $this->store;
    }
    /**
     * @ORM\PrePersist
     */
    public function updateCreatedAt()
    {
        // Add your code here
    }
}
