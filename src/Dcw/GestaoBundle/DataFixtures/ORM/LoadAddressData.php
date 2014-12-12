<?php

namespace Dcw\GestaoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Dcw\GestaoBundle\Entity\Address;

class LoadAddressData
    extends AbstractFixture
    implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $address = new Address();

        $address->setAddress("EQN 508/509");
        $address->setComplement("Bl A");
        $address->setNumber("Lt 1");
        $address->setNeighborhood("Asa Norte");
        $address->setCity("Brasília");
        $address->setState("DF");

        $manager->persist($address);
        $manager->flush();

    }

    public function getOrder()
    {
        return 1;
    }
}
