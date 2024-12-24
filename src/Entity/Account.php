<?php

namespace App\Entity;

use App\Repository\AccountRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccountRepository::class)]
class Account
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'account', cascade: ['persist', 'remove'])]
    private ?AccountSetting $accountSetting = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAccountSetting(): ?AccountSetting
    {
        return $this->accountSetting;
    }

    public function setAccountSetting(AccountSetting $accountSetting): static
    {
        // set the owning side of the relation if necessary
        if ($accountSetting->getAccount() !== $this) {
            $accountSetting->setAccount($this);
        }

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
