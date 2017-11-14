<?php

namespace Cerveza2Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;




class CervezasType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombre',TextType::class,array('label'=>'Nombre: ',
                                             'label_attr'=>array('class'=>'etiqueta'),
                                             'attr'=>array('class'=>'formulario')))

        ->add('pais',TextType::class,array('label'=>'Pais: ',
                                           'label_attr'=>array('class'=>'etiqueta'),
                                           'attr'=>array('class'=>'formulario')))

        ->add('poblacion',IntegerType::class,array('label'=>'Poblacion: ',
                                                   'label_attr'=>array('class'=>'etiqueta'),
                                                   'attr'=>array('class'=>'formulario')))

        ->add('tipo',TextType::class,array('label'=>'Tipo de cerveza: ',
                                           'label_attr'=>array('class'=>'etiqueta'),
                                           'attr'=>array('class'=>'formulario')))

        ->add('importacion',CheckboxType::class,array('label'=>'¿Es de importacion?: ',
                                                      'label_attr'=>array('class'=>'etiqueta'),
                                                      'attr'=>array('class'=>'formulario')))

        ->add('tamano',IntegerType::class,array('label'=>'Tamaño: ',
                                                'label_attr'=>array('class'=>'etiqueta'),
                                                'attr'=>array('class'=>'formulario')))

        ->add('cantidad',IntegerType::class,array('label'=>'Cantidad: ',
                                                  'label_attr'=>array('class'=>'etiqueta'),
                                                  'attr'=>array('class'=>'formulario')))

        ->add('foto',TextType::class,array('label'=>'Foto: ',
                                           'label_attr'=>array('class'=>'etiqueta'),
                                           'attr'=>array('class'=>'formulario')))
        ->add('Enviar',SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cerveza2Bundle\Entity\Cervezas'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cerveza2bundle_cervezas';
    }


}
