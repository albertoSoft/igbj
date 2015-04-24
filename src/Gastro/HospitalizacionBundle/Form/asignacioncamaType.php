<?php
namespace Gastro\HospitalizacionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gastro\HospitalizacionBundle\Util\StringToCamaTransformer;

class asignacioncamaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('admision', new admisionType() )
        ->add($builder->create('cama','text')->addModelTransformer(new StringToCamaTransformer()))
        ->add('fecha','date',array(
                'attr' => array('class' => 'calendario'),
                'widget' => 'single_text',
                'format' => 'y-MM-dd',
                        ))
        ->add('hora' )
        ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gastro\HospitalizacionBundle\Entity\Asignacioncama'
        ) ) ;
    }
    public function getName()
    {
        return 'gastro_hospitalizacionbundle_asignacioncamatype' ;
    }
}
