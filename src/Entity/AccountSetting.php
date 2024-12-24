<?php

namespace App\Entity;

use App\Repository\AccountSettingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccountSettingRepository::class)]
class AccountSetting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $locale = null;

    #[ORM\OneToOne(inversedBy: 'accountSetting', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Account $account = null;

    /**
     * @var Collection<int, AccountMultipleSetting>
     */
    #[ORM\OneToMany(targetEntity: AccountMultipleSetting::class, mappedBy: 'accountSetting')]
    private Collection $accountMultipleSettings;

    public function __construct()
    {
        $this->accountMultipleSettings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): static
    {
        $this->locale = $locale;

        return $this;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(Account $account): static
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return Collection<int, AccountMultipleSetting>
     */
    public function getAccountMultipleSettings(): Collection
    {
        return $this->accountMultipleSettings;
    }

    public function addAccountMultipleSetting(AccountMultipleSetting $accountMultipleSetting): static
    {
        if (!$this->accountMultipleSettings->contains($accountMultipleSetting)) {
            $this->accountMultipleSettings->add($accountMultipleSetting);
            $accountMultipleSetting->setAccountSetting($this);
        }

        return $this;
    }

    public function removeAccountMultipleSetting(AccountMultipleSetting $accountMultipleSetting): static
    {
        if ($this->accountMultipleSettings->removeElement($accountMultipleSetting)) {
            // set the owning side to null (unless already changed)
            if ($accountMultipleSetting->getAccountSetting() === $this) {
                $accountMultipleSetting->setAccountSetting(null);
            }
        }

        return $this;
    }
}
