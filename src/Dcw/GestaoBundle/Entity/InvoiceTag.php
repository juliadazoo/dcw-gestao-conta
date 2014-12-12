<?php

namespace Dcw\GestaoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceTag
 */
class InvoiceTag
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Dcw\GestaoBundle\Entity\Invoice
     */
    private $invoice;

    /**
     * @var \Dcw\GestaoBundle\Entity\Tag
     */
    private $tag;


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
     * Set invoice
     *
     * @param \Dcw\GestaoBundle\Entity\Invoice $invoice
     * @return InvoiceTag
     */
    public function setInvoice(\Dcw\GestaoBundle\Entity\Invoice $invoice = null)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return \Dcw\GestaoBundle\Entity\Invoice 
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Set tag
     *
     * @param \Dcw\GestaoBundle\Entity\Tag $tag
     * @return InvoiceTag
     */
    public function setTag(\Dcw\GestaoBundle\Entity\Tag $tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return \Dcw\GestaoBundle\Entity\Tag 
     */
    public function getTag()
    {
        return $this->tag;
    }
}
