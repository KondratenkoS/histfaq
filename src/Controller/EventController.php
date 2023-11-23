<?php

namespace App\Controller;

use App\Entity\Events;
use App\Repository\EventsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    #[Route('/event/{slug}', name: 'event')]
    public function index(string $slug, EventsRepository $eventRepository): Response
    {
        $event = $eventRepository->findOneBy(['slug' => $slug]);
        dump($event);
        return $this->render('event/event-page.html.twig', ['event' => $event]);
    }
}
