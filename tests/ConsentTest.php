<?php

namespace DynamicConsent\Tests;

use PHPUnit\Framework\TestCase;
use DynamicConsent\Models\Consent;
use DynamicConsent\Repositories\InMemoryConsentRepository;
use DynamicConsent\Services\ConsentService;

class ConsentTest extends TestCase
{
    public function testGiveConsent()
    {
        $repository = new InMemoryConsentRepository();
        $service = new ConsentService($repository);

        $consent = $service->giveConsent(1, 'email_marketing', true);

        $this->assertEquals(1, $consent->getUserId());
        $this->assertEquals('email_marketing', $consent->getModule());
        $this->assertTrue($consent->isGranted());
    }

    public function testFindConsent()
    {
        $repository = new InMemoryConsentRepository();
        $service = new ConsentService($repository);

        $service->giveConsent(1, 'email_marketing', true);
        $consent = $service->getConsent(1, 'email_marketing');

        $this->assertNotNull($consent);
        $this->assertTrue($consent->isGranted());
    }
}
