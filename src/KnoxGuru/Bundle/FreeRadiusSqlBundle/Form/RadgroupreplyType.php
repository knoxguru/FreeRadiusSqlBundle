<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use KnoxGuru\Bundle\FreeRadiusSqlBundle\Lists\Attributes;

class RadgroupreplyType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	    ->add('groupname')
            ->add('attribute', 'choice', array(
                'choices' => Attributes::get(),     
                'required' => true,
                'empty_value' => '',
                'empty_data' => null,
                'multiple'  => false,
            ))
            ->add('op', 'choice', array(
                'choices' => Attributes::getOpReply(),
                'required' => true,
                'empty_value' => '',
                'empty_data' => null,
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
            'data_class' => 'KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radgroupreply'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'knoxguru_bundle_freeradiussqlbundle_radgroupreply';
    }
}
