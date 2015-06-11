<?php
namespace Gastro\HospitalizacionBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Gastro\HospitalizacionBundle\Form\Datatransformer\StringToDiagnosticoTransformer;
use Gastro\PersonaBundle\Form\Datatransformer\StringToPacienteTransformer;
use Gastro\PersonaBundle\Form\Datatransformer\StringToPersonaTransformer;
use Gastro\HospitalizacionBundle\Form\Datatransformer\StringToSeguroTransformer;

class AdmisionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $emSice= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager('sice');
        $builder
        ->add($builder->create('diagnostico','text')->addModelTransformer(new StringToDiagnosticoTransformer()))
        ->add('servicio')
        ->add($builder->create('paciente','text')->addModelTransformer(new StringToPacienteTransformer()))
        ->add($builder->create('medico','text')->addModelTransformer(new StringToPersonaTransformer()))
        ->add('ingresapor',NULL,
                array('mapped'   => true,
                      'expanded' => true,
        //              'choices'  => array('1'=>'INSTITUCIONAL','2'=>'CONVENIO'),
        //            'data'     => '1',
                      'required' => TRUE,
                     )
              )
//normal        ->add('seguro',NULL,array('attr'=> array('style'=> 'display:normal;')))
//textbox        ->add($builder->create('seguro','text')->addModelTransformer(new StringToSeguroTransformer()))
        ->add('tipoPaciente','choice',
                array('mapped'   => false,
                      'expanded' => false,
                      'choices'  => array('1'=>'INSTITUCIONAL','2'=>'CONVENIO'),
        //            'data'     => '1',
                      'required' => TRUE,
                     )
              )
        ->add('seguro', 'choice',
                array('mapped'   => false,
                      'expanded' => false,
                      'choices'  => $emSice->getRepository('SiceBundle:Vshinstitu')->devolverListaArray(),
        //            'data'     => '1',
                      'required' => TRUE,
                      'attr'     => array('style'=> 'display:normal;'), 
                     ))
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
