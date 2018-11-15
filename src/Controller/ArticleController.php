<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticleController
 * @package App\Controller
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index()
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

//
//    /**
//     * @Route("/article/{id}", name="article_show")
//     * @param Article $article
//     * @return Response
//     */
//    public function show($id) :Response
//    {
//        $repo= $this->getDoctrine()->getRepository(Article::class);
//        $article=$repo->find($id);
//
//        return $this->render('article/show.html.twig', ['article'=>$article]);
//    }

//    /**
//     * @Route("/article/{id}", name="article_show")
//     * @param Article $article
//     * @return Response
//     */
//    public function show(Article $article) :Response
//    {
//        return $this->render('article/show.html.twig', ['article'=>$article]);
//    }


    /**
     * @Route("article/new", name="article_new")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request):Response
    {

        $article = new Article();
        $form = $this->createForm(ArticleSearchType::class, $article);
        //hydrate automatiquement l’objet Article avec les données saisies dans le formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_new');
        }


        return $this->render('article/index.html.twig', [
            'article'=>$article,
            'form' => $form->createView(),
            'controller_name' => 'ArticleController',
        ]);
    }


}
