<?php

// src/Controller/ProductController.php
namespace App\Controller;

// ...

use App\Entity\Test;
use App\Service\TestService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TestController extends AbstractController
{
    private SerializerInterface $serializer;
    private TestService $testService;

    public function __construct(SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $this->testService = new TestService($entityManager);
        $this->serializer = $serializer;
    }

    #[Route('/api/products', methods: ['POST'])]
    public function createProduct(#[MapRequestPayload] Test $test): Response
    {

        return new Response($this->serializer->serialize($this->testService->createTest($test), 'json'));
    }
}
