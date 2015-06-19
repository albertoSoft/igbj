<?php
namespace Gastro\HospitalizacionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Gastro\HospitalizacionBundle\Form\Datatransformer\StringToCamaTransformer;
//use Gastro\HospitalizacionBundle\Form\EventListener\AddReferidoSubscriber;

class AsignacioncamaType extends AbstractType
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
            'label' => 'Fecha de internacion',
              ))
//        ->add('hora' )
//        ->add("referido2","checkbox", array("mapped" => false,))
        ->add('referido', 'choice',
                array('mapped'   => false,
                      'expanded' => true,
                      'choices'  => array('1' => 'SI', '2' => 'NO'),
        //            'data'     => '1',
                      'required' => TRUE,
                     ))
        ;
   //     $builder->addEventSubscriber(new AddReferidoSubscriber());
        
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
