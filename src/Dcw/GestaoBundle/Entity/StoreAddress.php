<?php

namespace Dcw\GestaoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoreAddress
 */
class StoreAddress
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Dcw\GestaoBundle\Entity\Store
     */
    private $store;

    /**
     * @var \Dcw\GestaoBundle\Entity\Address
     */
    private $address;


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
     * Set store
     *
     * @param \Dcw\GestaoBundle\Entity\Store $store
     * @return StoreAddress
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
     * Set address
     *
     * @param \Dcw\GestaoBundle\Entity\Address $address
     * @return StoreAddress
     */
    public function setAddress(\Dcw\GestaoBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Dcw\GestaoBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }
}
