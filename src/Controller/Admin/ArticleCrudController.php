<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        // return [
        //     IdField::new('id'),
        //     TextField::new('title'),
        //     TextEditorField::new('description'),
        // ];

        yield TextField::new('name');
        yield TextareaField::new('body')
            ->hideOnIndex()
        ;

        yield  DateTimeField::new('created_at')->setFormat('Y-MM-dd HH:mm')->renderAsNativeWidget();

        yield ImageField::new('img')
            ->setBasePath('images')
            ->setUploadDir('public/images')
            ->setLabel('Photo')
        ;
        
    }
    
}
