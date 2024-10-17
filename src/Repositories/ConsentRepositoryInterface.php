<?php
namespace DynamicConsent\Repositories;

use DynamicConsent\Models\Consent;

interface ConsentRepositoryInterface
{
    public function save(Consent $consent);
    public function findByUserAndModule($userId, $module);
    public function findAllByUser($userId);
}
