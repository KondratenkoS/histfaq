<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    #[Route('/event/{id}', name: 'event', requirements: ['id' => '[1-9+]*'])]
    public function index(int $id, EventRepository $eventRepository): Response
    {
        $event = $eventRepository->find($id);
        dump($event);
        return $this->render('event/event-page.html.twig', ['event' => $event]);
    }
}
