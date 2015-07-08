<?php

namespace Gastro\CensoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdmisionIngresaporType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('admisionPaciente',null,array('attr' => array('readonly' => 'readonly','style'=>'display:none'),'label' => ' '))
            ->add('ingresapor',NULL,array('mapped'   => true,
                                          'expanded' => true,
                                          'required' => TRUE,
                                          'label'    => 'INGRESA POR :'
                                          )
                 );
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gastro\CensoBundle\Entity\AdmisionIngresapor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gastro_censobundle_admisioningresapor';
    }
}
