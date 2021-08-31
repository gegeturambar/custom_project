<?php

namespace App\Entity;

use App\Repository\GiftRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GiftRepository::class)
 */
class Gift
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="gifts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity=GiftShare::class, mappedBy="gift")
     */
    private $giftShares;

    public function __construct()
    {
        $this->giftShares = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection|GiftShare[]
     */
    public function getGiftShares(): Collection
    {
        return $this->giftShares;
    }

    public function addGiftShare(GiftShare $giftShare): self
    {
        if (!$this->giftShares->contains($giftShare)) {
            $this->giftShares[] = $giftShare;
            $giftShare->setGift($this);
        }

        return $this;
    }

    public function removeGiftShare(GiftShare $giftShare): self
    {
        if ($this->giftShares->removeElement($giftShare)) {
            // set the owning side to null (unless already changed)
            if ($giftShare->getGift() === $this) {
                $giftShare->setGift(null);
            }
        }

        return $this;
    }
}
