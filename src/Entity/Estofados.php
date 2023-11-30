<?php

namespace App\Entity;

use App\Repository\EstofadosRepository;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Expr\Cast\Double;

#[ORM\Entity(repositoryClass: EstofadosRepository::class)]
class Estofados
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $Valor = null;

    #[ORM\ManyToOne(inversedBy: 'estofados')]
    private ?Tabela $tabela = null;

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

    public function getValor(): ?int
    {
        return $this->Valor;
    }

    public function setValor(int $Valor): static
    {
        $this->Valor = $Valor;

        return $this;
    }

    public function getTabela(): ?Tabela
    {
        return $this->tabela;
    }

    public function setTabela(?Tabela $tabela): static
    {
        $this->tabela = $tabela;

        return $this;
    }

    public function __toString()
    {
    return (string) $this-> getValor();
    }
}
