<?php

namespace RobertvanLienden\UserAgreements\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class AgreementService
{
    private array $agreements;
    public function __construct(private ContainerBagInterface $containerBag)
    {
        $this->agreements = $this->containerBag->get('user_agreements');
    }

    public function getAgreements(): array
    {
        return $this->agreements;
    }
}