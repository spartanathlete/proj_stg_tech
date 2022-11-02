<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index()
    {
        // return this->render('index.html.twig');
        dd("This is the main page where all products displayed");
    }

    #[Route('/', name: 'app_main')]
    public function readAll(): JsonResponse
    {
        // return this->render('index.html.twig');
        dd("This is the main page where all products displayed");
    }
}
