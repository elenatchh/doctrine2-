<?php

namespace App\Controller;

use App\Repository\MembreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/categorie', name: 'app_categorie')]
    public function categorie(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/membre', name: 'app_membre')]
    public function membre(MembreRepository $membrerepo): Response
    {
        $membres=$membrerepo->findAll();
        return $this->render('home/membre.html.twig', [
            'membres' => $membres,
        ]);
    }
    #[Route('/produit', name: 'app_produit')]
    public function produit(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
