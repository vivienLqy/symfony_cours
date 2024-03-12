<?php

namespace App\Service;

use App\Entity\Test;
use Doctrine\ORM\EntityManagerInterface;

class TestService
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function createTest()
    {
        $product = new Test();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $this->entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $this->entityManager->flush();
    }
}
