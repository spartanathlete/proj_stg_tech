<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index()
    {
        // return this->render('index.html.twig');
        dd("This is the main page where all products displayed");
    }

    #[Route('/', name: 'read_all')]
    public function readAll()
    {
        $tasks = $this->getDoctrine()->getRepository(Task::class)->findBy([],['id'=>'DESC']);
        $paginatedTasks = $paginator->paginate($tasks, $request->query->getInt('page', 1), 5);
        return $this->render('all.html.twig', ['tasks' => $paginatedTasks]);
    }
}
