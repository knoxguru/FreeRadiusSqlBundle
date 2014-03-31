<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use KnoxGuru\Bundle\FreeRadiusSqlBundle\Lists\Attributes;

class RadcheckType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('attribute', 'choice', array(
	    	'choices' => Attributes::get(),
		'required' => true, 
		'multiple'  => false,
		)
	    )
            ->add('op', 'choice', array(
	    	'choices' => Attributes::getOpCheck(),
		'required' => true, 
		'multiple'  => false,
	    ))
            ->add('value')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radcheck'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'knoxguru_bundle_freeradiussqlbundle_radcheck';
    }

    /**
    * @return array
    */
    private function getChoices() {
	return array(
             
	);
    }
}
