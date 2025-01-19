<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('firstname'),
            TextField::new('lastname'),
            EmailField::new('email'),
            TextField::new('password')
            ->onlyOnForms()
            ->setFormType(PasswordType::class)
            ->setFormTypeOptions(
                [
                    'required' => false,
                    'mapped' => false,
                    'empty_data' => '',
                    'attr' => ['autocomplete' => 'new-password'],
                ]
            ),
            ArrayField::new('roles'),
        ];
    }
}
