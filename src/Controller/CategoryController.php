<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CategoryController
 * @package App\Controller
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("category/new", name="category_new")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request):Response
    {

        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        //hydrate automatiquement l’objet Article avec les données saisies dans le formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('category_new');
        }


        return $this->render('category/index.html.twig', [
            'category'=>$category,
            'form' => $form->createView(),
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
