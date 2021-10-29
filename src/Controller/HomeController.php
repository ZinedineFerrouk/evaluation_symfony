<?php

namespace App\Controller;

use App\Repository\ProprietaireRepository;
use App\Repository\RestaurantRepository;
use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(RestaurantRepository $restaurantRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'restaurants' => $restaurantRepository->findAll(),
        ]);
    }

    #[Route('/restaurant/{name}', name: 'resto_details')]
    public function getRestoByName(string $name, RestaurantRepository $restaurantRepository): Response
    {
        return $this->render('restaurant/index.html.twig', [
            'resto' => $restaurantRepository->findOneBy(["name" => $name])
        ]);
    }

    #[Route('/ville/{name}', name: 'ville_details')]
    public function getVilleByName(string $name, VilleRepository $villeRepository): Response
    {
        return $this->render('ville/index.html.twig', [
            'ville' => $villeRepository->findOneBy(["name" => $name])
        ]);
    }

    #[Route('/proprietaire/{name}', name: 'proprio_details')]
    public function getProprioByName(string $name, ProprietaireRepository $proprioRepository): Response
    {
        return $this->render('proprietaire/index.html.twig', [
            'proprio' => $proprioRepository->findOneBy(["name" => $name])
        ]);
    }
}
