<?php

namespace App\Entity;

use App\Repository\AccountMultipleSettingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccountMultipleSettingRepository::class)]
class AccountMultipleSetting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'accountMultipleSettings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AccountSetting $accountSetting = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Foo $foo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccountSetting(): ?AccountSetting
    {
        return $this->accountSetting;
    }

    public function setAccountSetting(?AccountSetting $accountSetting): static
    {
        $this->accountSetting = $accountSetting;

        return $this;
    }

    public function getFoo(): ?Foo
    {
        return $this->foo;
    }

    public function setFoo(?Foo $foo): static
    {
        $this->foo = $foo;

        return $this;
    }
}
