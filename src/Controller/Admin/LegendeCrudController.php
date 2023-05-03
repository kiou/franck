<?php

namespace App\Controller\Admin;

use App\Entity\Legende;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LegendeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Legende::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('titre')
            ->add('categorie')
        ;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Legende')
            ->setEntityLabelInPlural('Legendes')
            ->setDefaultSort(['id' => 'DESC'])
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
        ;
    }

    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('titre', 'Titre');
         yield ChoiceField::new('categorie')
            ->autocomplete()->setChoices([
                'Carte 1' => 'Carte 1',
                'Carte 2' => 'Carte 2',
                'Carte 3' => 'Carte 3'
            ]);
         yield TextEditorField::new('contenu')
            ->hideOnIndex()
            ->setColumns('col-sm-12 col-lg-12 col-xxl-12')
            ->setFormType(CKEditorType::class);
  
    }

}
