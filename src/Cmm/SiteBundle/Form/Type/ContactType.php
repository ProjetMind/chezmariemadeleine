<?php

namespace Cmm\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civilite', 'choice', 
                    array(
                            'label'     => 'Civilité : *',
                            'required'  => true,
                            'choices'   => array(
                                0   => 'Mme',
                                1   => 'Mr',
                            ),
                            'multiple'  => false,
                            'expanded'  => true,
                            'label_attr'=> array(
                                'class' => 'control-label',
                                'style' => 'display: inline-block;'
                            )
                    ))
            ->add('nom', 'text',
                    array(
                            'label'     => 'Nom : *',
                            'required'  => false,
                            'label_attr'=> array(
                                'class' => 'control-label'
                            ),
                            'attr'      => array(
                                'class'    => 'input-xlarge'
                            )
                    ))
            ->add('prenom', 'text',
                    array(
                            'label'     => 'Prénom : *',
                            'required'  => true,
                            'label_attr'=> array(
                                'class' => 'control-label'
                            ),
                            'attr'      => array(
                                'class'    => 'input-xlarge'
                            )
                    ))
            ->add('email', 'email',
                    array(
                            'label'     => 'E-mail : *',
                            'required'  => true,
                            'label_attr'=> array(
                                'class' => 'control-label'
                            ),
                            'attr'      => array(
                                'class'    => 'input-xlarge'
                            )
                    ))
            ->add('objet', 'text',
                    array(
                            'label'     => 'Objet : *',
                            'required'  => true,
                            'label_attr'=> array(
                                'class' => 'control-label'
                            ),
                            'attr'      => array(
                                'class'    => 'input-xlarge'
                            )
                    ))    
            ->add('message', 'textarea',
                    array(
                            'label'     => 'Votre message : *',
                            'required'  => true,
                            'label_attr'=> array(
                                'class' => 'control-label'
                            ),
                            'attr'      => array(
                                'class' => 'input-xlarge',
                                'style'  => 'height: 200px;'
                            )
                    ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cmm\SiteBundle\Entity\Contact'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cmm_sitebundle_contact';
    }
}
