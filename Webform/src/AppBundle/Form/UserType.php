<?php
    namespace AppBundle\Form;

    use Symfony\Component\Form\AbstractType;
    use Symfony\component\Form\FormBuilderInterface;


    class UserType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
                ->add('name', 'text')
                ->add('country', 'text')
                ->add('register', 'submit', array('label' => 'Register User'));
        }

        public function getName()
        {
            return 'app_user';
        }
    }
?>