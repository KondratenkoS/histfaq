<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    #[Route('/event/{id}', name: 'event', requirements: ['id' => '[1-9+]*'])]
    public function index(int $id): Response
    {
        return $this->render('event/event-page.html.twig');
    }
}
