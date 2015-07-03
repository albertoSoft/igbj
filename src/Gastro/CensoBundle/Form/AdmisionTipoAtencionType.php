<?php

namespace Gastro\CensoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdmisionTipoAtencionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $emSice= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager('sice');
        $builder
            ->add('admisionPaciente',null,
                array('attr'  => array('style'=> 'display:none;'),
                      'label' => ' '
                     ))
            ->add('seguro', 'choice',
                array('mapped'   => false,
                      'expanded' => false,
                      'choices'  => $emSice->getRepository('SiceBundle:Vshinstitu')->devolverListaArray(),
        //            'data'     => '1',
                      'required' => TRUE,
                      'attr'     => array('style'=> 'display:normal;'), 
                     ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gastro\CensoBundle\Entity\AdmisionTipoAtencion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gastro_censobundle_admisiontipoatencion';
    }
}
