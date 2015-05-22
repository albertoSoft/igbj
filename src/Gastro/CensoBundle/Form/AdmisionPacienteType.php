<?php
namespace Gastro\CensoBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

//use Gastro\HospitalizacionBundle\Util\StringToDiagnosticoTransformer;
use Gastro\HospitalizacionBundle\Util\StringToPacienteTransformer;
//use Gastro\PersonaBundle\Util\StringToPersonaTransformer;

class AdmisionPacienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
        ->add($builder->create('paciente','text')->addModelTransformer(new StringToPacienteTransformer()))
        ->add('fecharegistro','date',array(
                'attr' => array('class' => 'calendario','readonly' => 'readonly','disabled'=>'disabled','style'=>'display:none'),
                'widget' => 'single_text',
                'format' => 'y-MM-dd',
                'label' => ' ',
               ))
        ->add('pendiente','hidden',array('attr'=>array('value'=>'0')))
        ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gastro\CensoBundle\Entity\AdmisionPaciente'
        )) ;
    }
    
    public function getName()
    {
        return 'gastro_censobundle_admisionpacientetype';
    }
}
