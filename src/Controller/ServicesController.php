<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Service;
use App\Form\ServiceForm;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ObjectManager;



final class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services')]
    public function index(ServiceRepository $serviceRepository): Response
    {
        $services = $serviceRepository->findAll();
        return $this->render('services/index.html.twig', [
            'services' => $services,
        ]);
    }
    #[Route('/create-service', name: 'create_service')]
    public function createService(EntityManagerInterface $entityManager): Response
    {
        $service = new Service();
        $service->setName('Gazon');
        $service->setDetails("Lorem Ipsum");


        $entityManager->persist($service);
        $entityManager->flush();

        return new Response('Service créée avec ID : ' . $service->getId());
    }
    #[Route('/services/new', name: 'app_service_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $service = new Service();
        $form = $this->createForm(ServiceForm::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($service);
            $entityManager->flush();

            return $this->redirectToRoute('app_services', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('services/new.html.twig', [
            'form' => $form->createView(),
            "service" => $service,
        ]);
    }

    #[Route('/update-service/{id}', name: 'update_service')]
    public function update(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        $serviceToUpdate = $entityManager->getRepository(Service::class)->find($id);

        if (!$serviceToUpdate) {
            return new Response('Produit non trouvé.');
        }

        $name = $request->query->get('name');
        $img = $request->query->get('img');
        $description = $request->query->get('description');

        $serviceToUpdate->setName($name);
        $serviceToUpdate->setImg($img);
        $serviceToUpdate->setDetails($description);

        $entityManager->flush();

        return new Response('
    Produit mis à jour avec succès avec');
    }
    #[Route('/show-service/{id}', name: 'show_service')]
    public function show(int $id, EntityManagerInterface $entityManager): Response
    {
        $service = $entityManager->getRepository(Service::class)->find($id);

        if (!$service) {
            return new Response('Produit non trouvé', 404);
        }

        return new Response(
            'Service : ' . $service->getName() . '<br/>' .
                'Image : ' . $service->getImg() . ' <br/>' .
                'Description : ' . $service->getDetails()
        );
    }
    #[Route('/show-service', name: 'show_service')]
    public function showAllServices(EntityManagerInterface $entityManager): Response
    {
        $services = $entityManager->getRepository(Service::class)->findAll();

        if (!$services) {
            return new Response('Produits non trouvés', 404);
        }

        $html = "";

        for($i = 0; $i < count($services); $i++) {
            $html .= 'Service : ' . $services[$i]->getName() . '<br/>' .
                'Image : ' . $services[$i]->getImg() . ' <br/>' .
                'Description : ' . $services[$i]->getDetails() . "<br/>";
        }


        return new Response($html);
    }
    #[Route('/delete-service/{id}', name: 'delete_service')]
    public function delete(int $id, EntityManagerInterface $entityManager): Response
    {
        $service = $entityManager->getRepository(Service::class)->find($id);

        if (!$service) {
            return new Response('Service non trouvé', 404);
        }

        $entityManager->remove($service);
        $entityManager->flush();

        return new Response('Service supprimé avec succès.');
    }
}
