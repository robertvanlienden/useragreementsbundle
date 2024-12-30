<?php

namespace RobertvanLienden\UserAgreements\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class AgreementService
{
    public function __construct(
        ContainerBagInterface $containerBag,
        private array $agreements = []
    ) {
        $this->agreements = $containerBag->get('user_agreements')['agreements'];
    }

    public function getAgreements(): array
    {
        return $this->agreements;
    }

    public function findAgreement(string $label): ?array
    {
        $arrayKey = array_search(strtolower($label), array_map('strtolower', array_column($this->agreements, 'label')));

        return $arrayKey !== false ? $this->agreements[$arrayKey] : null;
    }
}
