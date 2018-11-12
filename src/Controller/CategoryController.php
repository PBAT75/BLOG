<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index()
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }


//    /**
//     * @Route("/category/{id}", name="category_show")
//     */
//    public function show($id) :Response
//    {
//        $repo= $this->getDoctrine()->getRepository(Category::class);
//        $category=$repo->find($id);
//
//        return $this->render('category/show.html.twig', ['category'=>$category]);
//    }

    /**
     * @Route("/category/{id}", name="category_show")
     * @param Category $category
     * @return Response
     */
    public function show(Category $category) :Response
    {
        return $this->render('category/show.html.twig', ['category'=>$category]);
    }
}
