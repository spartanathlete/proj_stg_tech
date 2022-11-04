<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Cemponent\HttpFoundation\JsonResponse;
use Knp\Component\Pager\PaginatorInterface;
//use Symfony\Cemponent\Routing\Annotation\Route;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

//#[Route('/category', name: 'app_main')]
class CategoryController extends AbstractController
{
    //#[Route('/', name: 'category_index')]
    public function index(CategoryRepository $catRepo)
    {
        $categories = $catRepo->findAll();
        dd($categories);
    }

    //#[Route('/add', name: 'category_add')]
    public function add()
    {
        $objectManager = $this->getDoctrine()->getManager();
        
        $category = new Category;
        $category->setName("Wearables");
        $category->setDescription("Every thing you can wear (T-Shirts, Pants...)");
        
        $created = date('d-m-y h:i:s');
        $category->setCreated($created);
        
        $objectManager->persist($category);
        $objectManager->flush();
        dd($category);
    }

    public function update($id) {

        $objectManager = $this->getDoctrine()->getManager();

        $task = $objectManager->getRepository(Task::class)->find($id);

        $task->setStatus(!$task->getStatus());

        $objectManager->flush();

        $this->addFlash('info', 'You have updated a task!');

        return $this->redirectToRoute('all');

    }
}
