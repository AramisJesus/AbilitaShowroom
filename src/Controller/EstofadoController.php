<?php

namespace App\Controller;

use App\Entity\Estofados;
use App\Form\EstofadosType;
use App\Repository\EstofadosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/estofado')]
class EstofadoController extends AbstractController
{
    #[Route('/', name: 'app_estofado_index', methods: ['GET'])]
    public function index(EstofadosRepository $estofadosRepository): Response
    {
        return $this->render('estofado/index.html.twig', [
            'estofados' => $estofadosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_estofado_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $estofado = new Estofados();
        $form = $this->createForm(EstofadosType::class, $estofado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($estofado);
            $entityManager->flush();

            return $this->redirectToRoute('app_estofado_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('estofado/new.html.twig', [
            'estofado' => $estofado,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_estofado_show', methods: ['GET'])]
    public function show(Estofados $estofado): Response
    {
        return $this->render('estofado/show.html.twig', [
            'estofado' => $estofado,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_estofado_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Estofados $estofado, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EstofadosType::class, $estofado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_estofado_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('estofado/edit.html.twig', [
            'estofado' => $estofado,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_estofado_delete', methods: ['POST'])]
    public function delete(Request $request, Estofados $estofado, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$estofado->getId(), $request->request->get('_token'))) {
            $entityManager->remove($estofado);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_estofado_index', [], Response::HTTP_SEE_OTHER);
    }
}
