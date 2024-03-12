<?php

namespace App\Service;

use App\Entity\Product;

class ProductsService
{
    public function allProducts(): string
    {
        return 'All products';
    }
    public function product(int $id): string
    {
        return 'produts id :' . $id;
    }
    public function createProduct(): Product
    {
        $bottle = new Product();
        $bottle->setname('Evian')->setPrice(39);
        return $bottle;
    }
}
