<?php declare(strict_types=1);

namespace App\Type;

use App\Entity\SlideshowBackground;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SlideshowBackgroundType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('image', FileType::class, [
            'required' => true,
            'mapped' => false,
        ]);
        $builder->add('imageAlt', TextType::class, ['required' => true]);
        $builder->add('upload', SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SlideshowBackground::class,
        ]);
    }
}