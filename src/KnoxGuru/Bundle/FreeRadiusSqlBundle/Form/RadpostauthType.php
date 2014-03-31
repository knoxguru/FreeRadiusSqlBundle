<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RadpostauthType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('pass')
            ->add('reply')
            ->add('authdate', 'datetime', [
	    	'data' => new \DateTime(),
	    ])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radpostauth'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'knoxguru_bundle_freeradiussqlbundle_radpostauth';
    }
}
