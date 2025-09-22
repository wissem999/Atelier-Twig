<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig',[
            'controller_name' => 'TestController',
        ]);
    }

    #[Route('/bonjour', name: 'app_home')]
    public function bonjour(): Response
    {
        return new Response("bonjour mes étudiants");
        
    }
}
