<?php


namespace MiloudH\KdenliveBundle\Model\Track;


use MiloudH\KdenliveBundle\Model\Property;
use MiloudH\KdenliveBundle\Trait\TimecodedTrait;
use Symfony\Component\Serializer\Annotation\SerializedPath;

class Transition
{
    use TimecodedTrait;

    #[SerializedPath("[@id]")]
    private ?string $id = null;

    #[SerializedPath("[@mlt_service]")]
    private ?string $mlt_service = null;

    #[SerializedPath("[@a_track]")]
    private ?string $aTrack = null;

    #[SerializedPath("[@b_track]")]
    private ?string $bTrack = null;

    /**
     * @var Property[]
     */
    #[SerializedPath("[property]")]
    private array $properties = [];

    public function setBTrack(?int $bTrack): self
    {
        $this->bTrack = $bTrack;

        return $this;
    }

    public function getBTrack(): ?int
    {
        return $this->bTrack;
    }

    public function getATrack(): ?int
    {
        return $this->aTrack;
    }

    public function setATrack(?int $aTrack): self
    {
        $this->aTrack = $aTrack;

        return $this;
    }

    public function getMltService(): ?string
    {
        return $this->mlt_service;
    }

    public function setMltService(?string $mlt_service): self
    {
        $this->mlt_service = $mlt_service;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setProperties(array $properties): self
    {
        $this->properties = $properties;

        return $this;
    }

    public function addProperty(Property $property): self
    {
        $this->properties[] = $property;

        return $this;
    }
}
