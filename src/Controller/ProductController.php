<?php

// namespace App\Controller;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Attribute\Route;
// use Symfony\Component\Serializer\SerializerInterface;
// use App\Service\ProductsService;

// class ProductController extends AbstractController
// {

//     private $productsService;
//     private SerializerInterface $serializer;

//     public function __construct(SerializerInterface $serializer)
//     {
//         $this->productsService = new ProductsService;
//         $this->serializer = $serializer;
//     }
//     #[Route('/')]
//     public function homepage()
//     {
//         $randomId = rand(1, 100);
//         return new Response(
//             "<ul>
//                 <li><a href='/api/products/'>mes produits</a></li>
//                 <li><a href='/api/products/{$randomId}'>produits</a></li>
//             </ul>"
//         );
//     }

//     #[Route('/api/products/', methods: ['GET'])]
//     public function showAll(): Response
//     {
//         return new Response($this->productsService->allProducts());
//     }
//     // #[Route('/api/products/{id}', methods: ['GET'])]
//     // public function show(int $id): Response
//     // {
//     //     return new Response($this->productsService->product($id));
//     // }

//     #[Route('/api/products/game', methods: ['GET'])]
//     public function addProduct(): Response
//     {
//         return new Response($this->serializer->serialize($this->productsService->createProduct(), 'json'));
//     }
// }
