<?php
/**
 * Created by PhpStorm.
 * User: stijnblommerde
 * Date: 25/02/17
 * Time: 21:38
 */

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MenuItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('course', ChoiceType::class, ['choices' => [
                'appetizer' => 'appetizer',
                'entree' => 'entree',
                'main' => 'main',
                'dessert' => 'dessert',
                'beverage' => 'beverage']])
            ->add('price', MoneyType::class)
            ->add('description', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\MenuItem'
        ]);
    }
}