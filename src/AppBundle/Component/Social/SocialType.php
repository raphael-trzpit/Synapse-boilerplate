<?php

namespace AppBundle\Component\Social;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Synapse\Cmf\Bundle\Form\Type\Theme\ComponentDataType;

class SocialType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return ComponentDataType::class;
    }

    /**
     * Free component form prototype definition.
     *
     * @see FormInterface::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('facebook_link', TextType::class, ['required' => false])
            ->add('twitter_link', TextType::class, ['required' => false])
            ->add('google_plus_link', TextType::class, ['required' => false])
            ->add('youtube_link', TextType::class, ['required' => false])
        ;
    }
}
