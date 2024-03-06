<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AerolineaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AerolineaRepository::class)]
#[ApiResource]
class Aerolinea
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private ?string $nombre = null;

    #[ORM\OneToMany(targetEntity: Vuelo::class, mappedBy: 'aerolinea')]
    private Collection $vuelos;

    public function __construct()
    {
        $this->vuelos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection<int, Vuelo>
     */
    public function getVuelos(): Collection
    {
        return $this->vuelos;
    }

    public function addVuelo(Vuelo $vuelo): static
    {
        if (!$this->vuelos->contains($vuelo)) {
            $this->vuelos->add($vuelo);
            $vuelo->setAerolinea($this);
        }

        return $this;
    }

    public function removeVuelo(Vuelo $vuelo): static
    {
        if ($this->vuelos->removeElement($vuelo)) {
            // set the owning side to null (unless already changed)
            if ($vuelo->getAerolinea() === $this) {
                $vuelo->setAerolinea(null);
            }
        }

        return $this;
    }
}
