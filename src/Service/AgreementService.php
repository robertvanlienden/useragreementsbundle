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

    public function findAgreement(string $id): ?array
    {
        $arrayKey = array_search(strtolower($id), array_map('strtolower', array_column($this->agreements, 'id')));

        return $arrayKey !== false ? $this->agreements[$arrayKey] : null;
    }
}
