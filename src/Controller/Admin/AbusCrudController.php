<?php

namespace App\Controller\Admin;

use App\Entity\Abus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AbusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Abus::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
