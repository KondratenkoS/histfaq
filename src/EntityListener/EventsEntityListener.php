<?php

namespace App\EntityListener;

use App\Entity\Events;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events as ORMEvents;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsEntityListener(event: ORMEvents::prePersist, entity: Events::class)]
#[AsEntityListener(event: ORMEvents::preUpdate, entity: Events::class)]
class EventsEntityListener
{
    public function __construct(
        private SluggerInterface $slugger,
    ) {
    }

    public function prePersist(Events $events, LifecycleEventArgs $event)
    {
        $events->computeSlug($this->slugger);
    }

    public function preUpdate(Events $events, LifecycleEventArgs $event)
    {
        $events->computeSlug($this->slugger);
    }
}