<?php

namespace App\Service;

use App\Entity\Test;
use Doctrine\ORM\EntityManagerInterface;

class TestService
{
    // Declaration de la proprieter entityManager
    private EntityManagerInterface $entityManager;

    // Contructeur de la class TestService qui prend un parametre de type EntityManagerInterface et initialise une proprieter $entityManager
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function createTest(Test $test)
    {
        $product = new Test();
        $product->setName($test->getName());
        $product->setPrice($test->getPrice());
        $product->setDescription($test->getDescription());

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $this->entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $this->entityManager->flush();

        return $product;
    }
}
