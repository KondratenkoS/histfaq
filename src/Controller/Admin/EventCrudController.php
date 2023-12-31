<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use App\Form\Type\EventImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title')
            ->renderAsHtml()
        ;
        yield TextEditorField::new('text');
        yield CollectionField::new('images')
            ->setEntryType(EventImageType::class)
        ;
    }
}
