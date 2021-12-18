<?php

declare(strict_types =1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StoreController extends AbstractController
{
    #[Route('/store/product/{id}/details', name: 'store_show_product', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showProduct( int $id): Response
    {
        return $this->render('store/index.html.twig', [
            'controller_name' => 'StoreController',
            'id' => $id,
        ]);
    }

    #[Route('/store', name: 'store_list_product', methods: ['GET'])]
    public function store(): Response
    {
        return $this->render('store/productList.html.twig', [
            'controller_name' => 'StoreController',
        ]);
    }
}
