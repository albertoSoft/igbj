<?php

namespace Gastro\CensoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdmisionFechaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechainternacion','date',array(
                'attr' => array('class' => 'calendario','readonly' => 'readonly'),
                'widget' => 'single_text',
                'format' => 'y-MM-dd',
            'label' => 'Fecha de internacion',
              ))
            ->add('admisionPaciente',null,array(
                'attr' => array('readonly' => 'readonly','style'=>'display:none'),
       //         'widget' => 'single_text',
      //          'format' => 'y-MM-dd',
                'label' => ' ',
               ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gastro\CensoBundle\Entity\AdmisionFecha'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gastro_censobundle_admisionfecha';
    }
}
