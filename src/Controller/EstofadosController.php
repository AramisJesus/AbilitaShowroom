<?php

namespace App\Controller;

use App\Entity\Estofados;
use App\Repository\EstofadosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EstofadosController extends AbstractController
{
    #[Route('/', name: 'new_estofado', methods:[""])]
    public function newEstofado(EntityManagerInterface $em, Request $request ): JsonResponse
    {
        $parameters = json_decode($request->getContent(), true); 
        $estofado = new Estofados();
        $estofado->setName($parameters["name"]);
        $estofado->setValor($parameters["valor"]);

        $em->persist($estofado);
        $em->flush();
        return $this->json("Estofado salvo");
    }

    
    #[Route('/', name: 'get_all_estofados', methods:["GET"])]
    public function index(EstofadosRepository $estofadosRepository): JsonResponse
    {
        $estofados = $estofadosRepository->findAll();
        return $this->json($estofados);
    }

    #[Route('/{id}', name: 'delete_estofados', methods:["DELETE"])]
    public function delete(EntityManagerInterface $em, int $id) {
        $estofadosRepository = $em->getRepository(Estofados::class);
        $estofados = $estofadosRepository->find($id);
        $em->remove($estofados);
        $em->flush();
        return $this->json("Estofados remove");
    }

    #[Route('/{id}', name: 'edit_estofados', methods:["PUT"])]
    public function edit(EntityManagerInterface $em, int $id, Request $request) {
        $estofadosRepository = $em->getRepository(Estofados::class);
        $estofados = $estofadosRepository->find($id);

        $parameters = json_decode($request->getContent(), true);

        $estofados->setName($parameters["name"]);
        $estofados->setValor($parameters["valor"]);

        $em->persist($estofados);
        $em->flush();
        return $this->json("Estofados edit");
    }
}
