<?php

namespace RobertvanLienden\UserAgreements\Service;

use Doctrine\ORM\EntityManagerInterface;
use RobertvanLienden\UserAgreements\Entity\Traits\UserAgreementTrait;
use RobertvanLienden\UserAgreements\Entity\UserAgreement;
use Symfony\Component\Security\Core\User\UserInterface;

class AgreementHandlingService
{
    public function __construct(private EntityManagerInterface $entityManager, private AgreementService $agreementService)
    {
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function handleAgreementsFromFormType(array $agreements, UserInterface $user, bool $flushEntities = false): void
    {
        if (!in_array(UserAgreementTrait::class, class_uses(get_class($user)))) {
            throw new \InvalidArgumentException(
                sprintf('User does not have the %s. This is needed to handle agreements',
                    UserAgreementTrait::class)
            );
        }

        $agreements = $this->normalizeAgreementsLabels($agreements);
        $this->createUserAgreements($agreements, $user);

        if ($flushEntities) {
            $this->entityManager->flush();
        }
    }

    private function normalizeAgreementsLabels(array $agreements): array
    {
        $normalizedAgreements = [];

        foreach ($agreements as $key => $value) {
            // Remove the 'agree_' prefix from the key
            $normalizedKey = substr($key, 6);
            // Replace underscores with spaces in the key
            $normalizedKey = str_replace('_', ' ', $normalizedKey);
            $normalizedAgreements[$normalizedKey] = $value;
        }

        return $normalizedAgreements;
    }

    private function createUserAgreements(array $agreements, UserInterface $user): void
    {
        foreach ($agreements as $key => $value) {
            if (!$value) {
                continue;
            }

            $agreementFromConfig = $this->agreementService->findAgreement($key);

            if (empty($agreementFromConfig)) {
                throw new \Exception('Agreement not found');
            }

            $agreement = new UserAgreement();
            $agreement->setLabel($agreementFromConfig['label']);
            $agreement->setVersion($agreementFromConfig['version']);
            $agreement->setUser($user);
            $agreement->setAgreedAt(new \DateTime());

            $this->entityManager->persist($agreement);
        }
    }
}