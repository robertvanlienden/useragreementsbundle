<?php

namespace RobertvanLienden\UserAgreements\Entity;

use Doctrine\ORM\Mapping as ORM;
use RobertvanLienden\UserAgreements\Repository\UserAgreementRepository;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserAgreementRepository::class)]
class UserAgreement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: false)]
    private ?string $agreementId = null;

    #[ORM\Column(length: 255, nullable: false)]
    private ?string $label = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $version = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $agreedAt = null;

    #[ORM\ManyToOne(inversedBy: 'user_agreement')]
    #[ORM\JoinColumn(name: 'user_id', nullable: true)]
    private ?UserInterface $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getAgreementId(): ?string
    {
        return $this->agreementId;
    }

    public function setAgreementId(?string $agreementId): void
    {
        $this->agreementId = $agreementId;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): void
    {
        $this->label = $label;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): void
    {
        $this->version = $version;
    }

    public function getAgreedAt(): ?\DateTimeInterface
    {
        return $this->agreedAt;
    }

    public function setAgreedAt(?\DateTimeInterface $agreedAt): void
    {
        $this->agreedAt = $agreedAt;
    }

    public function getUser(): ?UserInterface
    {
        return $this->user;
    }

    public function setUser(?UserInterface $user): self
    {
        $this->user = $user;
        return $this;
    }
}
