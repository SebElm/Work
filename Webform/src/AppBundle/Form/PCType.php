<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\component\Form\FormBuilderInterface;


class PCType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('cpu', 'text')
            ->add('frequency', 'number')
            ->add('harddisk', 'integer')
            ->add('save', 'submit', array('label' => 'Submit'));
    }

    public function getName()
    {
        return 'app_computer';
    }
}
?>