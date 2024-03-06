<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ReservaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservaRepository::class)]
#[ApiResource]
class Reserva
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'reservas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vuelo $vuelo = null;

    #[ORM\Column]
    private ?int $cantidadPasajeros = null;

    #[ORM\Column(length: 50)]
    private ?string $clase = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVuelo(): ?Vuelo
    {
        return $this->vuelo;
    }

    public function setVuelo(?Vuelo $vuelo): static
    {
        $this->vuelo = $vuelo;

        return $this;
    }

    public function getCantidadPasajeros(): ?int
    {
        return $this->cantidadPasajeros;
    }

    public function setCantidadPasajeros(int $cantidadPasajeros): static
    {
        $this->cantidadPasajeros = $cantidadPasajeros;

        return $this;
    }

    public function getClase(): ?string
    {
        return $this->clase;
    }

    public function setClase(string $clase): static
    {
        $this->clase = $clase;

        return $this;
    }
}
