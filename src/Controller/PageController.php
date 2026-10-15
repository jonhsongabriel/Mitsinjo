<?php

namespace App\Controller;

use App\Entity\ContactMessage;
use App\Form\ContactMessageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('pages/home.html.twig');
    }

    #[Route('/a-propos', name: 'about')]
    public function about(): Response
    {
        return $this->render('pages/about.html.twig');
    }

    #[Route('/realisations', name: 'achievements')]
    public function achievements(): Response
    {
        return $this->render('pages/achievements.html.twig');
    }

    #[Route('/contact', name: 'contact', methods: ['GET', 'POST'])]
    public function contact(Request $request, EntityManagerInterface $entityManager): Response
    {
        $message = new ContactMessage();
        $form = $this->createForm(ContactMessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($message);
            $entityManager->flush();

            $this->addFlash('success', 'Merci, votre message a bien été envoyé.');

            return $this->redirectToRoute('contact');
        }

        return $this->render('pages/contact.html.twig', ['form' => $form]);
    }
}
