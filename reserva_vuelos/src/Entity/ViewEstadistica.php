<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ViewEstadisticaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ViewEstadisticaRepository::class, readOnly:true)]
#[ApiResource]
class ViewEstadistica
{
    
    #[ORM\Id]
    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private ?string $aerolinea = null;

    #[ORM\Column]
    private ?int $reservas = null;

   
    

    public function getAerolinea(): ?string
    {
        return $this->aerolinea;
    }

    public function setAerolinea(string $aerolinea): static
    {
        $this->aerolinea = $aerolinea;

        return $this;
    }

    public function getReservas(): ?int
    {
        return $this->reservas;
    }

    

    
}
