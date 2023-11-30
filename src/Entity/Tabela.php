<?php

namespace App\Entity;

use App\Repository\TabelaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TabelaRepository::class)]
class Tabela
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $number = null;

    #[ORM\OneToMany(mappedBy: 'tabela', targetEntity: Estofados::class)]
    private Collection $estofados;

    public function __construct()
    {
        $this->estofados = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return Collection<int, Estofados>
     */
    public function getEstofados(): Collection
    {
        return $this->estofados;
    }

    public function addEstofado(Estofados $estofado): static
    {
        if (!$this->estofados->contains($estofado)) {
            $this->estofados->add($estofado);
            $estofado->setTabela($this);
        }

        return $this;
    }

    public function removeEstofado(Estofados $estofado): static
    {
        if ($this->estofados->removeElement($estofado)) {
            // set the owning side to null (unless already changed)
            if ($estofado->getTabela() === $this) {
                $estofado->setTabela(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
    return (string) $this-> getNumber();
    }

}
