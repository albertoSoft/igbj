<?php
namespace Gastro\HospitalizacionBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Gastro\HospitalizacionBundle\Form\Datatransformer\StringToAdmisionTransformer;

class ReferidodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add($builder->create('admision','hidden')->addModelTransformer(new StringToAdmisionTransformer()))
        ->add('establecimiento')
        ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gastro\HospitalizacionBundle\Entity\Referidode'
        ) ) ;
    }
    
    public function getName()
    {
        return 'gastro_hospitalizacionbundle_referidodetype';
    }
}
