<?php

namespace Gastro\CensoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Gastro\HospitalizacionBundle\Form\Datatransformer\StringToDiagnosticoTransformer;
use Gastro\PersonaBundle\Form\Datatransformer\StringToPersonaTransformer;

class AdmisionDiagnosticoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('admisionPaciente',null,array(
                'attr' => array('readonly' => 'readonly','style'=>'display:none'),
       //         'widget' => 'single_text',
      //          'format' => 'y-MM-dd',
                'label' => ' ',
               ))
            ->add($builder->create('diagnostico','text')->addModelTransformer(new StringToDiagnosticoTransformer()))
            ->add($builder->create('medico','text')->addModelTransformer(new StringToPersonaTransformer()))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gastro\CensoBundle\Entity\AdmisionDiagnostico'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gastro_censobundle_admisiondiagnostico';
    }
}
