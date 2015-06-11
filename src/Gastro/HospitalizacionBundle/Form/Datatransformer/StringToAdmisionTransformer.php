<?php
namespace Gastro\HospitalizacionBundle\Form\Datatransformer;

use Symfony\Component\Form\DataTransformerInterface;

class StringToAdmisionTransformer implements DataTransformerInterface
{
    public function transform($admision)
    {
        if (!$admision) {
            return null;
        }

        return $admision->__toString();
    }

    public function reverseTransform($adm)
    {

        if (null === $adm) {
            return null;
        }

        $em= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
        $admision=$em->getRepository('HospitalizacionBundle:Admision')->find($adm);
        
        return $admision;
    }
}
