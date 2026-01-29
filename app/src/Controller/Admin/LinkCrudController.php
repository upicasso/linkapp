<?php

namespace App\Controller\Admin;

use App\Entity\Link;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LinkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Link::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('url'),
            IntegerField::new('priority'),
            DateTimeField::new('createdAt')->hideOnForm(),
        ];
    }
}
