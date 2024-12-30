<?php

namespace RobertvanLienden\UserAgreements\Tests\Service;

use PHPUnit\Framework\TestCase;
use RobertvanLienden\UserAgreements\Service\AgreementService;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class AgreementServiceTest extends TestCase
{
    private AgreementService $agreementService;

    protected function setUp(): void
    {
        $containerBagMock = $this->createMock(ContainerBagInterface::class);

        $agreementsData = [
            'agreements' => [
                ['label' => 'Privacy Policy', 'content' => 'Privacy content'],
                ['label' => 'Terms of Service', 'content' => 'Terms content'],
            ],
        ];

        $containerBagMock->method('get')
            ->with('user_agreements')
            ->willReturn($agreementsData);

        $this->agreementService = new AgreementService($containerBagMock);
    }

    public function testGetAgreements(): void
    {
        $agreements = $this->agreementService->getAgreements();

        $this->assertIsArray($agreements);
        $this->assertCount(2, $agreements);
        $this->assertArrayHasKey('label', $agreements[0]);
        $this->assertArrayHasKey('content', $agreements[0]);
    }

    public function testFindAgreement(): void
    {
        $agreement = $this->agreementService->findAgreement('Privacy Policy');

        $this->assertNotNull($agreement);
        $this->assertEquals('Privacy Policy', $agreement['label']);
        $this->assertEquals('Privacy content', $agreement['content']);
    }

    public function testFindAgreementNotFound(): void
    {
        $agreement = $this->agreementService->findAgreement('not existing');

        $this->assertNull($agreement);
    }
}
