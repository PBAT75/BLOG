<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TagController
 * @package App\Controller
 */
class TagController extends AbstractController
{
    /**
     * @Route("/tag/tag", name="tag_name")
     * @param Tag $tag
     * @return Response
     */
    public function index():Response
    {

        $tags = $this->getDoctrine()
            ->getRepository(Tag::class)
            ->findAll();

        return $this->render(
            'tag/index.html.twig',
            [
                'tags' => $tags,
                'controller_name' => 'TagController'
            ]
        );

    }

    /**
     * @Route ("/tag/{name}", name="tag_show")
     * @param string $tagName
     * @return Response
     */
    public function show(Tag $tag) : Response
    {

        return $this->render('tag/show.html.twig',
            ['tag' => $tag,
                'articles' => $tag->getArticles(),
                'controller_name' => 'TagController'
            ]
        );
    }
}
