<?php

namespace Usr\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class GroupchoiceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('group', ChoiceType::class, array(
                'expanded' => true,
                'multiple' => false,
                'choices' => array(
                    'Company' => 'Company',
                    'Individual' => 'Individual'
                )
            ))
            ->add('Submit', SubmitType::class);
    }
}
