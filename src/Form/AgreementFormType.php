<?php

namespace RobertvanLienden\UserAgreements\Form;

use RobertvanLienden\UserAgreements\Service\AgreementService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AgreementFormType extends AbstractType
{
    public function __construct(
        private AgreementService $agreementService,
        private UrlGeneratorInterface $urlGenerator
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $agreements = $this->agreementService->getAgreements();

        foreach ($agreements as $agreement) {
            $url = $this->urlGenerator->generate($agreement['route_name']);
            $builder->add(
                $agreement['id'],
                CheckboxType::class,
                [
                    'label' => sprintf('<a href="%s">%s</a>', $url, $agreement['label']),
                    'label_html' => true,
                    'required' => $agreement['required'],
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
