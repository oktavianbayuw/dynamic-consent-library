<?php
namespace DynamicConsent\Models;

class Consent
{
    private $userId;
    private $module;
    private $granted;
    private $createdAt;

    public function __construct($userId, $module, $granted)
    {
        $this->userId = $userId;
        $this->module = $module;
        $this->granted = $granted;
        $this->createdAt = new \DateTime();
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getModule()
    {
        return $this->module;
    }

    public function isGranted()
    {
        return $this->granted;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
