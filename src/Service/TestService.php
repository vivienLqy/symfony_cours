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
    public function getAllTest(): array
    {
        return $this->entityManager->getRepository(Test::class)->findAll();
    }
    public function getTestById(int $id): Test
    {
        return $this->entityManager->getRepository(Test::class)->find($id);
    }
    public function deleteTestById(int $id): string
    {
        $test = $this->entityManager->getRepository(Test::class)->find($id);
        if ($test) {
            $this->entityManager->remove($test);
            $this->entityManager->flush();
            return "L'élement avec l'id $id a été supprimé avec succès.";
        } else {
            return "Aucun élément avec l'id $id n'a été trouvé.";
        }
    }
}
