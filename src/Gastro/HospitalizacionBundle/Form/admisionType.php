<?php
namespace Gastro\HospitalizacionBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gastro\HospitalizacionBundle\Util\StringToDiagnosticoTransformer;
use Gastro\HospitalizacionBundle\Util\StringToPacienteTransformer;

class admisionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add($builder->create('diagnostico','text')->addModelTransformer(new StringToDiagnosticoTransformer()))
        ->add('servicio')
        ->add($builder->create('paciente','text')->addModelTransformer(new StringToPacienteTransformer()))
        ->add('medico' )
        ->add('ingresapor' )
        ->add('tipopac' )
        ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gastro\HospitalizacionBundle\Entity\Admision'
        ) ) ;
    }
    
    public function getName()
    {
        return 'gastro_hospitalizacionbundle_admisiontype';
    }
}
