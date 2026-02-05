<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Repository\ArticleRepository;

final class ArticleController extends AbstractController
{
    public function __construct(private ArticleRepository $articleRepository){

    }

    #[Route('/articles', name: 'app_article')]
    public function index(): Response
    {
        $articles = $this->articleRepository->findAll();
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articles,
        ]);
    }

    #[Route('/articles/{id}', name: 'app_article_detail')]
    public function article($id): Response
    {
        $article = $this->articleRepository->find($id);

        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'article' => $article,
        ]);
    }
}
