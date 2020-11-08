<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Product::class);

        $products = $repo->findAll();

        return $this->render('home.html.twig', [
            'products' => $products
        ]);
    }
}

?>