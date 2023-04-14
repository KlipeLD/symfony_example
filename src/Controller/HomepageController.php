<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use Twig\Environment;

class HomepageController extends AbstractController
{

    private ArticleRepository $articleRepository;
    
    public function __construct(ArticleRepository $repository)
    {
        $this->articleRepository = $repository;
    }

    #[Route('/', name: 'app_homepage')]
    public function index(Environment $twig, ArticleRepository $articleRepository): Response
    {
        return $this->render('homepage/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }
}
