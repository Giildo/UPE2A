<?php

namespace App\UI\Form\Control;

use App\Domain\DTO\ControlDTO;
use App\Domain\DTO\Interfaces\ControlDTOInterface;
use App\Domain\Model\Thumbnail;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateType extends AbstractType
{
    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ) {
        $builder
            ->add(
                'date',
                DateType::class,
                [
                    'error_bubbling' => true,
                ]
            )
            ->add(
                'thumbnail1',
                EntityType::class,
                [
                    'class'          => Thumbnail::class,
                    'choice_label'   => 'name',
                    'error_bubbling' => true,
                ]
            )
            ->add(
                'thumbnail2',
                EntityType::class,
                [
                    'class'          => Thumbnail::class,
                    'choice_label'   => 'name',
                    'error_bubbling' => true,
                ]
            )
            ->add(
                'thumbnail3',
                EntityType::class,
                [
                    'class'          => Thumbnail::class,
                    'choice_label'   => 'name',
                    'error_bubbling' => true,
                ]
            )
            ->add(
                'thumbnail4',
                EntityType::class,
                [
                    'class'          => Thumbnail::class,
                    'choice_label'   => 'name',
                    'error_bubbling' => true,
                ]
            )
            ->add(
                'thumbnail5',
                EntityType::class,
                [
                    'class'          => Thumbnail::class,
                    'choice_label'   => 'name',
                    'error_bubbling' => true,
                ]
            )
            ->add(
                'thumbnail6',
                EntityType::class,
                [
                    'class'          => Thumbnail::class,
                    'choice_label'   => 'name',
                    'error_bubbling' => true,
                ]
            )
            ->add(
                'thumbnail7',
                EntityType::class,
                [
                    'class'          => Thumbnail::class,
                    'choice_label'   => 'name',
                    'error_bubbling' => true,
                ]
            )
            ->add(
                'thumbnail8',
                EntityType::class,
                [
                    'class'          => Thumbnail::class,
                    'choice_label'   => 'name',
                    'error_bubbling' => true,
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => ControlDTOInterface::class,
                'empty_data' => function (FormInterface $form) {
                    $dto = new ControlDTO(
                        $form->get('date')
                             ->getData()
                    );

                    $dto->addThumbnail(
                        $form->get('thumbnail1')
                             ->getData()
                    );
                    $dto->addThumbnail(
                        $form->get('thumbnail2')
                             ->getData()
                    );
                    $dto->addThumbnail(
                        $form->get('thumbnail3')
                             ->getData()
                    );
                    $dto->addThumbnail(
                        $form->get('thumbnail4')
                             ->getData()
                    );
                    $dto->addThumbnail(
                        $form->get('thumbnail5')
                             ->getData()
                    );
                    $dto->addThumbnail(
                        $form->get('thumbnail6')
                             ->getData()
                    );
                    $dto->addThumbnail(
                        $form->get('thumbnail7')
                             ->getData()
                    );
                    $dto->addThumbnail(
                        $form->get('thumbnail8')
                             ->getData()
                    );

                    return $dto;
                }
            ]
        );
    }

}
