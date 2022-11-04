<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Cemponent\HttpFoundation\JsonResponse;
//use Symfony\Cemponent\Routing\Annotation\Route;
use App\Entity\Category;

//#[Route('/category', name: 'app_main')]
class CategoryController extends AbstractController
{
    //#[Route('/', name: 'category_index')]
    public function index(): JsonResponse
    {
        dd("This is the main page where all products displayed");
    }

    //#[Route('/add', name: 'category_add')]
    public function add()
    {
        $objectManager = $this->getDoctrine()->getManager();
        
        $category = new Category;
        $category->setName("Wearables");
        $category->setDescription("Every thing you can wear (T-Shirts, Pants...)");
        
        // $created = date('d-m-y h:i:s');
        // $cre_str=strval($created);
        // $category->setCreated($cre_str);
        
        $objectManager->persist($category);
        $objectManager->flush();
    }

    //#[Route('/read', name: 'category_add')]
    public function readAll(ProdRepo $prodRepo)
    {
        $products = $prodRepo->findAll();
        dd($products);
        // return $this->render('index.html.twig', [
        //     "days" => $days
        // ]);
    }
}
