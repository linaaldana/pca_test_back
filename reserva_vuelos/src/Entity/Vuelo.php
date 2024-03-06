<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VueloRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;

use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: VueloRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read']]
)]
#[ApiFilter(SearchFilter::class, properties: [
    'origen' => 'partial',
    'destino' => 'partial',
    'fechaSalida' => 'exact',

])]
#[ApiFilter(OrderFilter::class, properties: ['id'])]
class Vuelo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private ?string $origen = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private ?string $destino = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private ?string $fechaSalida = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private ?string $fechaLlegada = null;

    #[ORM\ManyToOne(inversedBy: 'vuelos')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read'])]
    private ?Aerolinea $aerolinea = null;

    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $precio = null;

    #[ORM\OneToMany(targetEntity: Reserva::class, mappedBy: 'vuelo', orphanRemoval: true)]
    private Collection $reservas;

    public function __construct()
    {
        $this->reservas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrigen(): ?string
    {
        return $this->origen;
    }

    public function setOrigen(string $origen): static
    {
        $this->origen = $origen;

        return $this;
    }

    public function getDestino(): ?string
    {
        return $this->destino;
    }

    public function setDestino(string $destino): static
    {
        $this->destino = $destino;

        return $this;
    }

    public function getFechaSalida(): ?string
    {
        return $this->fechaSalida;
    }

    public function setFechaSalida(string $fechaSalida): static
    {
        $this->fechaSalida = $fechaSalida;

        return $this;
    }

    public function getFechaLlegada(): ?string
    {
        return $this->fechaLlegada;
    }

    public function setFechaLlegada(string $fechaLlegada): static
    {
        $this->fechaLlegada = $fechaLlegada;

        return $this;
    }

    public function getAerolinea(): ?Aerolinea
    {
        return $this->aerolinea;
    }

    public function setAerolinea(?Aerolinea $aerolinea): static
    {
        $this->aerolinea = $aerolinea;

        return $this;
    }

    public function getPrecio(): ?int
    {
        return $this->precio;
    }

    public function setPrecio(int $precio): static
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * @return Collection<int, Reserva>
     */
    public function getReservas(): Collection
    {
        return $this->reservas;
    }

    public function addReserva(Reserva $reserva): static
    {
        if (!$this->reservas->contains($reserva)) {
            $this->reservas->add($reserva);
            $reserva->setVuelo($this);
        }

        return $this;
    }

    public function removeReserva(Reserva $reserva): static
    {
        if ($this->reservas->removeElement($reserva)) {
            // set the owning side to null (unless already changed)
            if ($reserva->getVuelo() === $this) {
                $reserva->setVuelo(null);
            }
        }

        return $this;
    }
}
