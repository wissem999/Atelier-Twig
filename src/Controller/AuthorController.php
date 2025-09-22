<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuthorController extends AbstractController
{
    private function getAuthors(): array
    {
        return [
            ['id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo','email' => 'victor.hugo@gmail.com','nb_books' => 100],
            ['id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => 'William Shakespeare','email' => 'william.shakespeare@gmail.com','nb_books' => 200],
            ['id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein','email' => 'taha.hussein@gmail.com','nb_books' => 300],
        ];
    }

    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    #[Route('/showAuthor', name: 'showAuthor')]
    public function showAuthor($name="wissem"): Response
    {
        return $this->render('author/show.html.twig', [
            'name' => $name,
        ]);
    }
    
    #[Route('/listAuthors', name: 'listAuthors')]
    
    public function listAuthors(): Response
    {
        
        // $authors2 is an empty array to test the "no authors found" scenario
        $authors2 = [];
        // $authors contains a list of authors with all their details
        $authors = $this->getAuthors();

        return $this->render('author/list.html.twig', [
            'authors' => $authors,
        ]);
    }

    #[Route('/authorDetails/{id}', name: 'authorDetails')]
    public function authorDetails($id): Response
    { 
        $authors = $this->getAuthors();
        $selectedAuthor = null;
        foreach ($authors as $author) {
            if ($author['id'] == $id) {
                $selectedAuthor = $author;
                break;
            }
        }
        return $this->render('author/showAuthor.html.twig', [
            'selectedAuthor' => $selectedAuthor,
        ]);
    }
      

    }

