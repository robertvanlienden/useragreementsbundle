<?php

namespace RobertvanLienden\UserAgreements\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;

class DoctrineMetadataListener implements EventSubscriber
{
    public function __construct(private string $userEntityClass)
    {
    }

    public function getSubscribedEvents()
    {
        return [Events::loadClassMetadata];
    }

    public function loadClassMetadata(LoadClassMetadataEventArgs $args): void
    {
        $classMetadata = $args->getClassMetadata();

        if ($classMetadata->getName() === 'RobertvanLienden\UserAgreements\Entity\UserAgreement') {
            foreach ($classMetadata->associationMappings as &$associationMapping) {
                if ($associationMapping['fieldName'] === 'user') {
                    $associationMapping['targetEntity'] = $this->userEntityClass;
                }
            }
        }
    }
}
