<?php
namespace Gastro\HospitalizacionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CamaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombre' )
        ->add('ocupada' )
        ->add('sala' )
        ->add('enumeracion' )
        ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gastro\HospitalizacionBundle\Entity\Cama'
        ) ) ;
    }
    public function getName()
    {
        return 'gastro_hospitalizacionbundle_camatype' ;
    }
}
