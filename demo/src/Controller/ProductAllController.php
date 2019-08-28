<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



class ProductAllController extends AbstractController
{
   


    /**
         * @Route("/productall", name="product")
         */
        public function list()
        {
            return $this->render('productall/list.html.twig', [
                'controller_name' => 'ProductAllController',
            ]);
        }


    /**
     * @Route("/productall/{slug}", name="product_show")
     */
    public function show($slug)
    {
        
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findOneBy(['slug' => $slug]);


        // Si le produit n'existe pas, on renvoie une 404
        if (!$product) {
            throw $this->createNotFoundException();
        }



        return $this->render('productall/list.html.twig', [
            'product' => $product,
        ]);
    }



}
