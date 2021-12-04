<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StoreController extends AbstractController
{
    #[Route('/store/product/{id}/details/{slug}', name: 'store_show_product', requirements: ['id'=>'\d+'], methods: ['GET'])]
    public function product(Request $request, int $id, string $slug): Response
    {
        $url = $request->server->get('REQUEST_URI');
        $ip = $request->getClientIp();
        return $this->render('store/index.html.twig', [
            'controller_name' => 'StoreController',
            'id' => $id,
            'slug' => $slug,
            'url' => $url,
            'ip' => $ip
        ]);
    }
}
