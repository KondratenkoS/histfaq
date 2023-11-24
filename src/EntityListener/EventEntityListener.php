<?php

namespace App\EntityListener;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events as ORMEvents;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsEntityListener(event: ORMEvents::prePersist, entity: Event::class)]
#[AsEntityListener(event: ORMEvents::preUpdate, entity: Event::class)]
class EventEntityListener
{
    public function __construct(
        private SluggerInterface $slugger,
    ) {
    }

    public function prePersist(Event $events, LifecycleEventArgs $event)
    {
        $events->computeSlug($this->slugger);
    }

    public function preUpdate(Event $events, LifecycleEventArgs $event)
    {
        $events->computeSlug($this->slugger);
    }
}