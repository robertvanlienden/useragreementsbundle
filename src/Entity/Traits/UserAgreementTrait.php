<?php

namespace RobertvanLienden\UserAgreements\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use RobertvanLienden\UserAgreements\Entity\UserAgreement;

trait UserAgreementTrait
{
    #[ORM\OneToMany(mappedBy: "user", targetEntity: UserAgreement::class)]
    private Collection $userAgreements;

    public function __construct()
    {
        $this->userAgreements = new ArrayCollection();
    }

    public function getUserAgreements(): Collection
    {
        return $this->userAgreements;
    }

    public function addUserAgreement(UserAgreement $userAgreement): self
    {
        if (!$this->userAgreements->contains($userAgreement)) {
            $this->userAgreements[] = $userAgreement;
            $userAgreement->setUser($this);
        }

        return $this;
    }

    public function removeUserAgreement(UserAgreement $userAgreement): self
    {
        if ($this->userAgreements->removeElement($userAgreement)) {
            $userAgreement->setUser(null);
        }

        return $this;
    }
}