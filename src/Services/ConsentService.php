<?php
namespace DynamicConsent\Services;

use DynamicConsent\Models\Consent;
use DynamicConsent\Repositories\ConsentRepositoryInterface;

class ConsentService
{
    private $repository;

    public function __construct(ConsentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function giveConsent($userId, $module, $granted)
    {
        $consent = new Consent($userId, $module, $granted);
        $this->repository->save($consent); // Pastikan ini memanggil metode save() pada repository
        return $consent;
    }

    public function getConsent($userId, $module)
    {
        return $this->repository->findByUserAndModule($userId, $module);
    }

    public function getAllUserConsents($userId)
    {
        return $this->repository->findAllByUser($userId);
    }
}
