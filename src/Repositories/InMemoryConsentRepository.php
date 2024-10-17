<?php
namespace DynamicConsent\Repositories;

use DynamicConsent\Models\Consent;

class InMemoryConsentRepository implements ConsentRepositoryInterface
{
    private $consents = [];

    public function save(Consent $consent)
    {
        $this->consents[] = $consent;
    }

    public function findByUserAndModule($userId, $module)
    {
        foreach ($this->consents as $consent) {
            if ($consent->getUserId() === $userId && $consent->getModule() === $module) {
                return $consent;
            }
        }
        return null;
    }

    public function findAllByUser($userId)
    {
        return array_filter($this->consents, function ($consent) use ($userId) {
            return $consent->getUserId() === $userId;
        });
    }
}