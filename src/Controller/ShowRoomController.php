<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowRoomController extends AbstractController
{
    #[Route('/show/room', name: 'app_show_room')]
    public function index(): Response
    {
        return $this->render('show_room/index.html.twig', [
            'controller_name' => 'ShowRoomController',
        ]);
    }

    #[Route('/cozinha', name: 'app_cozinha')]
    public function cozinha(): Response
    {
        return $this->render('show_room/Ambientes/Cozinha/cozinha.html.twig', [
            'controller_name' => 'ShowRoomController',
        ]);
    }

    #[Route('/ferragens', name: 'app_ferragens')]
    public function ferragens(): Response
    {
        return $this->render('show_room/Ambientes/Cozinha/ferragens.html.twig', [
            'controller_name' => 'ShowRoomController',
        ]);
    }
   
    #[Route('/eletro', name: 'app_eletros')]
    public function eletro(): Response
    {
        return $this->render('show_room/Ambientes/Cozinha/eletros.html.twig', [
            'controller_name' => 'ShowRoomController',
        ]);
    }

    #[Route('/Aluminios', name: 'app_aluminios')]
    public function Aluminios(): Response
    {
        return $this->render('show_room/Ambientes/Cozinha/aluminios.html.twig', [
            'controller_name' => 'ShowRoomController',
        ]);
    }
}
