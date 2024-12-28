<?php

namespace RobertvanLienden\UserAgreements\Form;

use RobertvanLienden\UserAgreements\Service\AgreementService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgreementFormType extends AbstractType
{
    public function __construct(private AgreementService $agreementService)
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $agreements = $this->agreementService->getAgreements();

        foreach ($agreements as $agreement) {
            $builder->add(
                'agree_' . strtolower(str_replace(' ', '_', $agreement['title'])),
                CheckboxType::class,
                [
                    'label' => $agreement['title'],
                    'required' => true,
                ]
            );
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // Configure any necessary options here (e.g., user entity or custom data)
        $resolver->setDefaults([]);
    }
}
