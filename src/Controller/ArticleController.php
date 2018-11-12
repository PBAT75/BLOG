<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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


    /**
     * @Route("/article/{id}", name="article_show")
     * @param Article $article
     * @return Response
     */
    public function show($id) :Response
    {
        $repo= $this->getDoctrine()->getRepository(Article::class);
        $article=$repo->find($id);

        return $this->render('article/show.html.twig', ['article'=>$article]);
    }
}
