<?php

namespace RobertvanLienden\UserAgreements\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class AgreementService
{
    public function __construct(ContainerBagInterface $containerBag, private array $config = [])
    {
        $this->config = $containerBag->get('user_agreements');
    }

    public function getAgreements(): array
    {
        return $this->config['agreements'];
    }
}