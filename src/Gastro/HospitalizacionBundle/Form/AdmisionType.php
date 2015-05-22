<?php
namespace Gastro\HospitalizacionBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Gastro\HospitalizacionBundle\Util\StringToDiagnosticoTransformer;
use Gastro\HospitalizacionBundle\Util\StringToPacienteTransformer;
use Gastro\PersonaBundle\Util\StringToPersonaTransformer;

class AdmisionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add($builder->create('diagnostico','text')->addModelTransformer(new StringToDiagnosticoTransformer()))
        ->add('servicio')
        ->add($builder->create('paciente','text')->addModelTransformer(new StringToPacienteTransformer()))
        ->add($builder->create('medico','text')->addModelTransformer(new StringToPersonaTransformer()))
        ->add('ingresapor' )
        ->add('seguro' )
        ->add('pendiente','hidden',array('attr'=>array('value'=>'0')))
        ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gastro\HospitalizacionBundle\Entity\Admision'
        )) ;
    }
    
    public function getName()
    {
        return 'gastro_hospitalizacionbundle_admisiontype';
    }
}
